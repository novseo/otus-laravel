@extends('layouts.app')

@section('content')
    <h1>Order Type Details</h1>
    <p><strong>Name:</strong> {{ $cycle->name }}</p>
    <a href="{{ route('cycles.index') }}" class="btn btn-secondary">Back to List</a>
@endsection

