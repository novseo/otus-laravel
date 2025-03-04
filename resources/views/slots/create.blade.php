@extends('layouts.app')

@section('content')
    <h1>Create New Slot</h1>
    <form action="{{ route('slots.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
            <label for="width">Width</label>
            <input type="number" name="width" id="width" class="form-control" required>
            <label for="length">Length</label>
            <input type="number" name="length" id="length" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

