@extends('layouts.app')

@section('content')
    <h1>Edit Cycle</h1>
    <form action="{{ route('cycles.update', $cycle) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $cycle->date }}" required>
            <label for="time_start">Time Start</label>
            <input type="time" name="time_start" id="time_start" class="form-control" value="{{ $cycle->time_start }}" required>
            <label for="time_end">Time End</label>
            <input type="time" name="time_end" id="time_end" class="form-control" value="{{ $cycle->time_end }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
