@extends('layouts.app')

@section('content')
    <div class="container">


        <h1 class="display-1" style="color:white;">Оборудование и слоты</h1>
       <br>
        <a href="{{ route('equipment_slots.create') }}" class="btn btn-primary">Добавить новую связь</a>
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
            @foreach ($equipment_slots as $equipment_slot)
                <tr>

                    <td>{{ $equipment_slot->equipment ? $equipment_slot->equipment->name : 'No equipment' }}</td>
                    <td>{{ $equipment_slot->slot ? $equipment_slot->slot->name : 'No slot' }}</td>
                    <td><a href="{{ route('equipment_slots.show', $equipment_slot) }}" class="btn btn-info">Просмотреть</a></td>
                    <td><a href="{{ route('equipment_slots.edit', $equipment_slot) }}" class="btn btn-warning">Редактировать</a></td>
                    <td>
                        <form action="{{ route('equipment_slots.destroy', $equipment_slot) }}" method="POST" style="display:inline;">
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

