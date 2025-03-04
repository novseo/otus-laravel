@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактировать связь</h1>
        <form action="{{ route('ingredient_products.update', $ingredient_product) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="product_id">Продукт</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    <option value="">Выбрать продукт</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $ingredient_product->product_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
                <label for="ingredient_id">Слот</label>
                <select name="ingredient_id" id="ingredient_id" class="form-control" required>
                    <option value="">Выбрать ингридиент</option>
                    @foreach($ingredients as $ingredient)
                        <option value="{{ $ingredient->id }}" {{ $ingredient_product->ingredient_id == $ingredient->id ? 'selected' : '' }}>
                            {{ $ingredient->name }}
                        </option>
                    @endforeach
                </select>
                <label for="quantity">Количество</label>
                <input type="integer" step="any" name="quantity" id="quantity" class="form-control" value="{{ $ingredient_product->quantity }}" required>
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

