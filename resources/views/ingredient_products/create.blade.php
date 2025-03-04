@extends('layouts.app')

@section('content')
    <div class="container-sm">
    <h1>Добавить новую связь</h1>
    <form action="{{ route('ingredient_products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Продукт</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">Выбрать продукт</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            <label for="ingredient_id">Ингридиент</label>
            <select name="ingredient_id" id="ingredient_id" class="form-control" required>
                <option value="">Выбрать ингредиент</option>
                @foreach($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                @endforeach
            </select>
            <label for="quantity">Количество гр.</label>
            <input type="number" step="any" name="quantity" id="quantity" class="form-control" required>
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

