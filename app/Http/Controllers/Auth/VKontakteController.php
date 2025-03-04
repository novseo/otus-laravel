<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class VKontakteController extends Controller
{
    public function redirectToVK()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function handleVKCallback()
    {
        try {
            $vkUser = Socialite::driver('vkontakte')->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('Ошибка при авторизации через VK.');
        }

        $user = User::where('vk_id', $vkUser->getId())->first();

        if (!$user) {
            $user = User::create([
                'name' => $vkUser->getName(),
                'email' => $vkUser->getEmail(),
                'vk_id' => $vkUser->getId(),
                'password' => bcrypt(str_random(16)), // Генерация случайного пароля
            ]);
        }

        Auth::login($user, true);

        return redirect('/home');
    }
}
