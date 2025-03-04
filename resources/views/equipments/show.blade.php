@extends('layouts.app')

@section('content')
    <div class="container">
    <h1 class="display-1" style="color:white;">Характеристики оборудования</h1>
    <p><strong>Name:</strong> {{ $equipment->name }}</p>
    <p><strong>Levels:</strong> {{ $equipment->levels }}</p>
    <p><strong>Width:</strong> {{ $equipment->width }}</p>
    <p><strong>Length:</strong> {{ $equipment->length }}</p>
    <a href="{{ route('equipments.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection

