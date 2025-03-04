@extends('layouts.app')

@section('content')
    <h1>Edit Order Type</h1>
    <form action="{{ route('order-types.update', $orderType) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $orderType->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
