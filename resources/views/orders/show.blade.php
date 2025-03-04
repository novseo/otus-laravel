@extends('layouts.app')

@section('content')
    <h1>Детали заказа</h1>
    <p><strong>Name:</strong> {{ $order->user_id }}</p>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to List</a>
@endsection

