@extends('layouts.app')

@section('content')
    <div class="container-sm">
        <h1 class="display-1" style="color:white;">Связь</h1>
        <p style="color:white;"><strong>Продукт:</strong> {{ $reservation_slot->roduct_id }}</p>
        <p style="color:white;"><strong>Цикл:</strong> {{ $reservation_slot->cycle_id }}</p>
        <p style="color:white;"><strong>Оборудование:</strong> {{ $reservation_slot->equipment_id }}</p>
        <a href="{{ route('order_products.index') }}" class="btn btn-secondary">Вернуться к списку</a>
    </div>
@endsection

