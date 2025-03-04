@extends('layouts.app')

@section('content')
    <div class="container-sm">
    <h1>Добавить новую связь</h1>
    <form action="{{ route('reservation_slots.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Продукт</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">Выбрать продукт</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            <label for="cycle_id">Цыкл</label>
            <select name="cycle_id" id="cycle_id" class="form-control" required>
                <option value="">Выбрать цикл</option>
                @foreach($cycles as $cycle)
                    <option value="{{ $cycle->id }}">{{ $cycle->date }}</option>
                @endforeach
            </select>
            <label for="equipment_id">Оборудование</label>
            <select name="equipment_id" id="equipment_id" class="form-control" required>
                <option value="">Выбрать оборудование</option>
                @foreach($equipments as $equipment)
                    <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Создать связь</button>
    </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
@endsection

