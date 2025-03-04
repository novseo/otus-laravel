@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактировать связь</h1>
        <form action="{{ route('reservation_slots.update', $reservation_slot) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="product_id">Продукт</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    <option value="">Выбрать продукт</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $reservation_slot->product_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
                <label for="cycle_id">Цикл</label>
                <select name="cycle_id" id="cycle_id" class="form-control" required>
                    <option value="">Выбрать цикл</option>
                    @foreach($cycles as $cycle)
                        <option value="{{ $cycle->id }}" {{ $reservation_slot->cycle_id == $cycle->id ? 'selected' : '' }}>
                            {{ $cycle->date }}
                        </option>
                    @endforeach
                </select>
                <label for="equipment_id">Оборудование</label>
                <select name="equipment_id" id="equipment_id" class="form-control" required>
                    <option value="">Выбрать оборудование</option>
                    @foreach($equipments as $equipment)
                        <option value="{{ $equipment->id }}" {{ $reservation_slot->equipment_id == $equipment->id ? 'selected' : '' }}>
                            {{ $equipment->name }}
                        </option>
                    @endforeach
                    </select>

            </div>
            <br>
            <button type="submit" class="btn btn-primary">Применить изменения</button>
        </form>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

