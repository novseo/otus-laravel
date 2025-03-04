@extends('layouts.app')

@section('content')
    <div class="container-sm">
        <h1 class="display-1" style="color:white;">Связь</h1>
        <p style="color:white;"><strong>Equipment:</strong> {{ $equipmentSlot->equipment_id }}</p>
        <p style="color:white;"><strong>Slot:</strong> {{ $equipmentSlot->slot_id }}</p>
        <a href="{{ route('equipment_slots.index') }}" class="btn btn-secondary">Вернуться к списку</a>
    </div>
@endsection

