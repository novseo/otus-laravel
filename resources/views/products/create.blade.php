@extends('layouts.app')

@section('content')
    <div class="container-sm">
    <h1>Добавить новый продукт</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
            <label for="slot_id">Slot</label>
            <select name="slot_id" id="slot_id" class="form-control" required>
                <option value="">Select a slot</option>
                @foreach($slots as $slot)
                    <option value="{{ $slot->id }}">{{ $slot->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection

