<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    <p>oh ouhluhloiuh luh ilup loiubiu iu </p>
                </div>
            </div>
        </div>
    </div>
    @section('content')
            <h1 class="display-1" style="color:white;">Навигация по данным</h1>
            <div class="row">
                <div class="col-md-4">
                    <p>
                        <a href="/equipments/" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Оборудование</a>
                    </p>
                    <p>
                        <a href="/slots/" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Слоты</a>
                    </p>
                    <p>
                        <a href="/products/" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Продукты</a>
                    </p>
                    <p>
                        <a href="/ingredients/" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Ингредиенты</a>
                    </p>
                    <p>
                        <a href="/cycles/" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Циклы</a>
                    </p>
                    <p>
                        <a href="/orders/" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Заказы</a>
                    </p>
                    <p>
                        <a href="/order_types/" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Типы заказы</a>
                    </p>
                </div>
                <div class="col-md-4">
                    <p>
                        <a href="/equipment_slots/" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Связанная таблица Оборудование слоты</a>
                    </p>
                    <p>
                        <a href="/ingredient_products/" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Связанная таблица Ингридиентов</a>
                    </p>
                    <p>
                        <a href="/order_products/" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Связанная таблица Заказов</a>
                    </p>
                    <p>
                        <a href="/reservation_slots/" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Связанная таблица Бронирования</a>
                    </p>
                </div>
            </div>




    <!-- Можно добавить больше содержимого, статистику и другие элементы -->
    @endsection
    <div>

    </div>

</x-app-layout>

