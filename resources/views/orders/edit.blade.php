@extends('layouts.app')

@section('content')
        <div class="container">
    <h1>Редактирование заказа</h1>
    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="time">Дата\Время выдачи заказа</label>
            <input type="datetime-local" name="time" id="time" class="form-control" value="{{ $order->time }}" required>

            <label for="user_id">Пользователь</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Выбор пользователя</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            <label for="order_type_id">Тип заказа</label>
            <select name="order_type_id" id="order_type_id" class="form-control" required>
                <option value="">Выбор тип заказа</option>
                @foreach($order_types as $order_type)
                    <option value="{{ $order_type->id }}" {{ $order->order_type_id == $order_type->id ? 'selected' : '' }}>
                        {{ $order_type->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
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

@endsection

