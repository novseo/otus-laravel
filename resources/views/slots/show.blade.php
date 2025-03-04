@extends('layouts.app')

@section('content')
    <h1>Slot Details</h1>
    <p><strong>Name:</strong> {{ $slot->name }}</p>
    <p><strong>Width:</strong> {{ $slot->width }}</p>
    <p><strong>Length:</strong> {{ $slot->length }}</p>
    <a href="{{ route('slots.index') }}" class="btn btn-secondary">Back to List</a>
@endsection

