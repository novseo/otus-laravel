@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-1" style="color:white;">Связь продуктов с заказами</h1>
        <br>
        <a href="{{ route('order_products.create') }}" class="btn btn-primary">Добавить новую связь</a>
        <hr><br>
        <br>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Продукт</th>
                    <th scope="col">Заказ</th>
                    <th scope="col">Просмотр</th>
                    <th scope="col">Редактирование</th>
                    <th scope="col">Удаление</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($order_products as $order_product)
                <tr>

                    <td>{{ $order_product->product ? $order_product->product->name : 'No product' }}</td>
                    <td>{{ $order_product->order ? $order_product->order->time : 'No order' }}</td>
                    <td><a href="{{ route('order_products.show', $order_product) }}" class="btn btn-info">Просмотреть</a></td>
                    <td><a href="{{ route('order_products.edit', $order_product) }}" class="btn btn-warning">Редактировать</a></td>
                    <td>
                        <form action="{{ route('order_products.destroy', $order_product) }}" method="POST" style="display:inline;">
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

