@extends('layouts.app')

@section('content')
    <div class="container">
    <h1 class="display-1" style="color:white;">Редактирование параметры ингредиентов</h1>
    <form action="{{ route('ingredients.update', $ingredient) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $ingredient->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Обновить данные</button>
    </form>
    </div>
@endsection
