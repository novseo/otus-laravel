@extends('layouts.app')

@section('content')
    <div class="container">
    <h1 class="display-1" style="color:white;">Добавить новый ингредиент</h1>
    <form action="{{ route('ingredients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Добавить ингредиент</button>
    </form>
    </div>
@endsection

