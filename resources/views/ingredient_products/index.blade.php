@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-1" style="color:white;">Связь продуктов с ингредиентами</h1>
        <br>
        <a href="{{ route('ingredient_products.create') }}" class="btn btn-primary">Добавить новую связь</a>
        <hr><br>
        <br>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Продукт</th>
                    <th scope="col">Ингредиент</th>
                    <th scope="col">Колличество</th>
                    <th scope="col">Просмотр</th>
                    <th scope="col">Редактирование</th>
                    <th scope="col">Удаление</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($ingredient_products as $ingredient_product)
                <tr>

                    <td>{{ $ingredient_product->product ? $ingredient_product->product->name : 'No product' }}</td>
                    <td>{{ $ingredient_product->ingredient ? $ingredient_product->ingredient->name : 'No ingredient' }}</td>
                    <td>{{ $ingredient_product->quantity }}</td>
                    <td><a href="{{ route('ingredient_products.show', $ingredient_product) }}" class="btn btn-info">Просмотреть</a></td>
                    <td><a href="{{ route('ingredient_products.edit', $ingredient_product) }}" class="btn btn-warning">Редактировать</a></td>
                    <td>
                        <form action="{{ route('ingredient_products.destroy', $ingredient_product) }}" method="POST" style="display:inline;">
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

