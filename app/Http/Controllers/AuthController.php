<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Если вы используете модель User для аутентификации

class AuthController extends Controller
{
    /**
     * Перенаправление пользователя на страницу авторизации VK.
     */
    public function redirectToVk()
    {
        $clientId = env('VK_CLIENT_ID'); // ID приложения VK
        $redirectUri = env('VK_REDIRECT_URI'); // Callback URL
        $scope = 'email'; // Запрашиваемые права (например, email)

        $url = "https://oauth.vk.com/authorize?client_id={$clientId}&redirect_uri={$redirectUri}&scope={$scope}&response_type=code";

        return redirect($url);
    }

    /**
     * Обработка callback от VK.
     */
    public function handleVkCallback(Request $request)
    {
        $code = $request->query('code'); // Код авторизации от VK

        if (!$code) {
            return redirect('/login')->with('error', 'Ошибка авторизации: код не получен.');
        }

        // Обмен кода на access_token
        $clientId = env('VK_CLIENT_ID');
        $clientSecret = env('VK_CLIENT_SECRET');
        $redirectUri = env('VK_REDIRECT_URI');

        $response = Http::get("https://oauth.vk.com/access_token", [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'redirect_uri' => $redirectUri,
            'code' => $code,
        ]);

        $data = $response->json();

        if (isset($data['error'])) {
            return redirect('/login')->with('error', 'Ошибка авторизации: ' . $data['error_description']);
        }

        $accessToken = $data['access_token'];
        $userId = $data['user_id'];
        $email = $data['email'] ?? null;

        // Получение информации о пользователе
        $userInfo = Http::get("https://api.vk.com/method/users.get", [
            'user_ids' => $userId,
            'access_token' => $accessToken,
            'v' => '5.131', // Версия API VK
            'fields' => 'first_name,last_name,photo_200',
        ]);

        $userData = $userInfo->json()['response'][0];

        // Создание или обновление пользователя в базе данных
        $user = User::updateOrCreate(
            ['vk_id' => $userId],
            [
                'name' => $userData['first_name'] . ' ' . $userData['last_name'],
                'email' => $email,
                'avatar' => $userData['photo_200'],
                'vk_token' => $accessToken,
            ]
        );

        // Аутентификация пользователя
        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Вы успешно авторизовались через VK!');
    }
}
