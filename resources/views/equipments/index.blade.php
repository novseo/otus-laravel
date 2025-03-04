@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h1 class="display-1" style="color:white;">Пекарное оборудование</h1>

    <a href="{{ route('equipments.create') }}" class="btn btn-primary">Добавить новое оборудование</a>
        <br><br>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Колличество уровней</th>
                <th scope="col">Ширина</th>
                <th scope="col">Длинна</th>
                <th scope="col">Просмотр</th>
                <th scope="col">Редактирование</th>
                <th scope="col">Удаление</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($equipments as $equipment)
            <tr>
                <td>{{ $equipment->name }}</td>
                <td>{{ $equipment->levels }}</td>
                <td>{{ $equipment->width }}</td>
                <td>{{ $equipment->length }}</td>
                <td><a href="{{ route('equipments.show', $equipment) }}" class="btn btn-info">Просмотреть</a></td>
                <td><a href="{{ route('equipments.edit', $equipment) }}" class="btn btn-warning">Редактировать</a></td>
                <td>
                    <form action="{{ route('equipments.destroy', $equipment) }}" method="POST" style="display:inline;">
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

