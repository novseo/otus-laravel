@extends('layouts.app')

@section('content')
    <div class="container">


        <h1 class="display-1" style="color:white;">Заказы</h1>
       <br>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Добавить новый зака</a>
        <hr><br>
        <br>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Пользователь</th>
                    <th scope="col">Время заказа</th>
                    <th scope="col">Тип заказа</th>
                    <th scope="col">Просмотр</th>
                    <th scope="col">Редактирование</th>
                    <th scope="col">Удаление</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->time }}</td>
                    <td>{{ $order->order_type_id }}</td>
                    <td><a href="{{ route('orders.show', $order) }}" class="btn btn-info">Просмотреть</a></td>
                    <td><a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">Редактировать</a></td>
                    <td>
                        <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection

