@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-1" style="color:white;">Параментры ингредиентов</h1>
        <p><strong>Name:</strong> {{ $ingredient->name }}</p>
        <a href="{{ route('ingredients.index') }}" class="btn btn-secondary">Вернуться к списку ингридиентов</a>
    </div>
@endsection

