@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-1" style="color:white;">Связь продуктов с заказами</h1>
        <br>
        <a href="{{ route('reservation_slots.create') }}" class="btn btn-primary">Добавить новую связь</a>
        <hr><br>
        <br>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Продукт</th>
                    <th scope="col">Цикл</th>
                    <th scope="col">Оборудование</th>
                    <th scope="col">Просмотр</th>
                    <th scope="col">Редактирование</th>
                    <th scope="col">Удаление</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($reservation_slots as $reservation_slot)
                <tr>

                    <td>{{ $reservation_slot->product ? $reservation_slot->product->name : 'No product' }}</td>
                    <td>{{ $reservation_slot->cycle ? $reservation_slot->cycle->date : 'No cycle' }}</td>
                    <td>{{ $reservation_slot->equipment ? $reservation_slot->equipment->name : 'No equipment' }}</td>
                    <td><a href="{{ route('reservation_slots.show', $reservation_slot) }}" class="btn btn-info">Просмотреть</a></td>
                    <td><a href="{{ route('reservation_slots.edit', $reservation_slot) }}" class="btn btn-warning">Редактировать</a></td>
                    <td>
                        <form action="{{ route('reservation_slots.destroy', $reservation_slot) }}" method="POST" style="display:inline;">
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

