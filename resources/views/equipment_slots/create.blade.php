@extends('layouts.app')

@section('content')
    <div class="container-sm">
    <h1>Добавить новый продукт</h1>
    <form action="{{ route('equipment_slots.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="equipment_id">Оборудование</label>
            <select name="equipment_id" id="equipment_id" class="form-control" required>
                <option value="">Выбрать оборудование</option>
                @foreach($equipments as $equipment)
                    <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                @endforeach
            </select>
            <label for="slot_id">Slot</label>
            <select name="slot_id" id="slot_id" class="form-control" required>
                <option value="">Выбрать слот</option>
                @foreach($slots as $slot)
                    <option value="{{ $slot->id }}">{{ $slot->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
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

