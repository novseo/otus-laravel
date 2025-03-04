@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактировать связь</h1>
        <form action="{{ route('equipment_slots.update', $equipment_slot) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="equipment_id">Оборудование</label>
                <select name="equipment_id" id="equipment_id" class="form-control" required>
                    <option value="">Выбрать слот</option>
                    @foreach($equipments as $equipment)
                        <option value="{{ $equipment->id }}" {{ $equipment_slot->equipment_id == $equipment->id ? 'selected' : '' }}>
                            {{ $equipment->name }}
                        </option>
                    @endforeach
                </select>
                <label for="slot_id">Слот</label>
                <select name="slot_id" id="slot_id" class="form-control" required>
                    <option value="">Выбрать слот</option>
                    @foreach($slots as $slot)
                        <option value="{{ $slot->id }}" {{ $equipment_slot->slot_id == $slot->id ? 'selected' : '' }}>
                            {{ $slot->name }}
                        </option>
                    @endforeach
                </select>
            </div>
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

