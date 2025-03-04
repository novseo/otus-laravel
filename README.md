# Otus Laravel Project

Этот проект представляет собой веб-приложение, разработанное на фреймворке Laravel. Для управления окружением разработки используется Laravel Sail. Ниже приведены инструкции по установке и запуску проекта.

## Требования

Перед началом работы убедитесь, что у вас установлены следующие компоненты:

- Docker (для работы с Sail)
- Docker Compose (обычно входит в Docker)
- Git (для работы с репозиторием)

## Установка проекта

1. **Клонируйте репозиторий:**

   ```bash
   git clone https://github.com/novseo/otus-laravel.git
   cd otus-laravel

2. **Скопируйте файл .env.example:**

    ```bash
        cp .env.example .env

3. **Откройте файл .env и настройте подключение к базе данных (Sail использует предопределенные настройки для Docker):**
     ```bash
        DB_CONNECTION=mysql
        DB_HOST=mysql
        DB_PORT=3306
        DB_DATABASE=otus_laravel
        DB_USERNAME=sail
        DB_PASSWORD=password

3. **Запустите Sail:**
    ```bash
    ./vendor/bin/sail up -d
    
Флаг -d запускает контейнеры в фоновом режиме.

4. **Установите зависимости Composer:**
    ```bash
    ./vendor/bin/sail composer install
5. **Сгенерируйте ключ приложения:**
    ```bash
    ./vendor/bin/sail artisan key:generate

6. Запустите миграции и сидеры:

    ```bash
    ./vendor/bin/sail artisan migrate --seed

7. **Установите зависимости Node.js:**
    ```bash
    ./vendor/bin/sail npm install
    
8. **Соберите фронтенд:**
    ```bash
    ./vendor/bin/sail npm run dev

9. **Или для продакшн-сборки:**
    ```bash
    ./vendor/bin/sail npm run build


Если контейнеры ещё не запущены, выполните:

bash
Copy
./vendor/bin/sail up -d
Откройте проект в браузере:

По умолчанию приложение будет доступно по адресу: http://localhost.
