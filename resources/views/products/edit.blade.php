@extends('layouts.app')

@section('content')
        <div class="container">
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
            <select name="slot_id" id="slot_id" class="form-control" required>
                <option value="">Select a slot</option>
                @foreach($slots as $slot)
                    <option value="{{ $slot->id }}" {{ $product->slot_id == $slot->id ? 'selected' : '' }}>
                        {{ $slot->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
        </div>
@endsection

