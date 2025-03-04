@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h1 class="display-1" style="color:white;">Ингредиенты</h1>

    <a href="{{ route('ingredients.create') }}" class="btn btn-primary">Добавить ингредиент</a>
        <br><br>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Просмотр</th>
                <th scope="col">Редактирование</th>
                <th scope="col">Удаление</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($ingredients as $ingredient)
            <tr>
                <td>{{ $ingredient->name }}</td>
                <td><a href="{{ route('ingredients.show', $ingredient) }}" class="btn btn-info">Просмотреть</a></td>
                <td><a href="{{ route('ingredients.edit', $ingredient) }}" class="btn btn-warning">Редактировать</a></td>
                <td>
                    <form action="{{ route('ingredients.destroy', $ingredient) }}" method="POST" style="display:inline;">
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

