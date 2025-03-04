@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h1 class="display-1" style="color:white;">Слоты</h1>

    <a href="{{ route('slots.create') }}" class="btn btn-primary">Добавить новый слот</a>
        <br><br>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Ширина</th>
                <th scope="col">Длинна</th>
                <th scope="col">Просмотр</th>
                <th scope="col">Редактирование</th>
                <th scope="col">Удаление</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($slots as $slot)
            <tr>
                <td>{{ $slot->name }}</td>
                <td>{{ $slot->width }}</td>
                <td>{{ $slot->length }}</td>
                <td><a href="{{ route('slots.show', $slot) }}" class="btn btn-info">Просмотреть</a></td>
                <td><a href="{{ route('slots.edit', $slot) }}" class="btn btn-warning">Редактировать</a></td>
                <td>
                    <form action="{{ route('slots.destroy', $slot) }}" method="POST" style="display:inline;">
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

