@extends('layouts.app')

@section('content')
    <h1>Product Details</h1>
    <p><strong>Name:</strong> {{ $product->name }}</p>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
@endsection

