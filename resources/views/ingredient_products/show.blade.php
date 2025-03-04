@extends('layouts.app')

@section('content')
    <div class="container-sm">
        <h1 class="display-1" style="color:white;">Связь</h1>
        <p style="color:white;"><strong>Продукт:</strong> {{ $ingredient_product->roduct_id }}</p>
        <p style="color:white;"><strong>Ингредиент:</strong> {{ $ingredient_product->ingredient_id }}</p>
        <p style="color:white;"><strong>Ингредиент:</strong> {{ $ingredient_product->quantity }}</p>
        <a href="{{ route('ingredient_products.index') }}" class="btn btn-secondary">Вернуться к списку</a>
    </div>
@endsection

