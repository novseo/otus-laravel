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


Скопируйте файл .env.example:

bash
Copy
cp .env.example .env
Откройте файл .env и настройте подключение к базе данных (Sail использует предопределенные настройки для Docker):

env
Copy
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=otus_laravel
DB_USERNAME=sail
DB_PASSWORD=password
Запустите Sail:

Используйте команду sail up для запуска контейнеров:

bash
Copy
./vendor/bin/sail up -d
Флаг -d запускает контейнеры в фоновом режиме.

Установите зависимости Composer:

bash
Copy
./vendor/bin/sail composer install
Сгенерируйте ключ приложения:

bash
Copy
./vendor/bin/sail artisan key:generate
Запустите миграции и сидеры:

Создайте таблицы в базе данных и заполните их тестовыми данными:

bash
Copy
./vendor/bin/sail artisan migrate --seed
Установите зависимости Node.js:

bash
Copy
./vendor/bin/sail npm install
Соберите фронтенд:

Соберите CSS и JavaScript файлы:

bash
Copy
./vendor/bin/sail npm run dev
Или для продакшн-сборки:

bash
Copy
./vendor/bin/sail npm run build
Запуск проекта
Запустите Sail:

Если контейнеры ещё не запущены, выполните:

bash
Copy
./vendor/bin/sail up -d
Откройте проект в браузере:

По умолчанию приложение будет доступно по адресу: http://localhost.
