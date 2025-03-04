@extends('layouts.app')

@section('content')
    <h1>Create New Order Type</h1>
    <form action="{{ route('order-types.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

