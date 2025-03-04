@extends('layouts.app')

@section('content')
    <div class="container-sm">
    <h1>Добавить новую связь</h1>
    <form action="{{ route('order_products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Продукт</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">Выбрать продукт</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            <label for="order_id">Заказ</label>
            <select name="order_id" id="order_id" class="form-control" required>
                <option value="">Выбрать заказ</option>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->time }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Создать связь</button>
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

