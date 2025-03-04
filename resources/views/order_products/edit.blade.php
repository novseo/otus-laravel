@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактировать связь</h1>
        <form action="{{ route('order_products.update', $order_product) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="product_id">Продукт</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    <option value="">Выбрать продукт</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $order_product->product_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
                <label for="order_id">Слот</label>
                <select name="order_id" id="order_id" class="form-control" required>
                    <option value="">Выбрать заказ</option>
                    @foreach($orders as $order)
                        <option value="{{ $order->id }}" {{ $order_product->order_id == $order->time ? 'selected' : '' }}>
                            {{ $order->time }}
                        </option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Применить изменения</button>
        </form>
    </div>
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

