@extends('layouts.app')

@section('content')
    <h1>Edit Slot</h1>
    <form action="{{ route('slots.update', $slot) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $slot->name }}" required>
            <label for="name">Width</label>
            <input type="number" name="width" id="width" class="form-control" value="{{ $slot->width }}" required>
            <label for="name">Length</label>
            <input type="number" name="length" id="length" class="form-control" value="{{ $slot->length }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
