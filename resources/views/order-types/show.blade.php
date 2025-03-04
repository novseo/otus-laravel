@extends('layouts.app')

@section('content')
    <h1>Order Type Details</h1>
    <p><strong>Name:</strong> {{ $orderType->name }}</p>
    <a href="{{ route('order-types.index') }}" class="btn btn-secondary">Back to List</a>
@endsection

