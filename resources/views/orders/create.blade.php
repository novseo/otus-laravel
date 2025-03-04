@extends('layouts.app')

@section('content')
    <div class="container-sm">
    <h1>Добавить новый заказ</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="time">Дата\Время выдачи заказа</label>
            <input type="datetime-local" name="time" id="time" class="form-control" required>

            <label for="user_id">Пользователь</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Выбрать пользователя</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>

            <label for="order_type_id">Тип заказа</label>
            <select name="order_type_id" id="order_type_id" class="form-control" required>
                <option value="">Выбрать тип заказа</option>
                @foreach($order_types as $order_type)
                    <option value="{{ $order_type->id }}">{{ $order_type->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
@endsection

