@extends('layouts.app')

@section('content')
    <div class="container">
    <h1 class="display-1" style="color:white;">Добавить новое оборудование</h1>
    <form action="{{ route('equipments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
            <label for="width">Levels</label>
            <input type="number" name="levels" id="levels" class="form-control" required>
            <label for="width">Width</label>
            <input type="number" name="width" id="width" class="form-control" required>
            <label for="length">Length</label>
            <input type="number" name="length" id="length" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    </div>
@endsection

