@extends('layouts.app')

@section('content')
    <div class="container">
    <h1 class="display-1" style="color:white;">Редактирование характеристик оборудования</h1>
    <form action="{{ route('equipments.update', $equipment) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $equipment->name }}" required>
            <label for="name">Levels</label>
            <input type="number" name="levels" id="levels" class="form-control" value="{{ $equipment->levels }}" required>
            <label for="name">Width</label>
            <input type="number" name="width" id="width" class="form-control" value="{{ $equipment->width }}" required>
            <label for="name">Length</label>
            <input type="number" name="length" id="length" class="form-control" value="{{ $equipment->length }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Обновить данные</button>
    </form>
    </div>
@endsection
