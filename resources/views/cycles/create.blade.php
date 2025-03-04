@extends('layouts.app')

@section('content')
    <h1>Create New Cycle</h1>
    <form action="{{ route('cycles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
            <label for="time_start">Time Start</label>
            <input type="time" name="time_start" id="time_start" class="form-control" required>
            <label for="time_end">Time End</label>
            <input type="time" name="time_end" id="time_end" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection

