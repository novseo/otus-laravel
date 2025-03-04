@extends('layouts.app')

@section('content')
    <div class="container">


        <h1 class="display-1" style="color:white;">Продукты</h1>
       <br>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Добавить новый продукт</a>
        <hr><br>
        <br>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Название</th>
                    <th scope="col">Слот</th>
                    <th scope="col">Просмотр</th>
                    <th scope="col">Редактирование</th>
                    <th scope="col">Удаление</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->slot ? $product->slot->name : 'No slot' }}</td>
                    <td><a href="{{ route('products.show', $product) }}" class="btn btn-info">Просмотреть</a></td>
                    <td><a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Редактировать</a></td>
                    <td>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
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

