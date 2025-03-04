@extends('layouts.app')

@section('content')
    <h1>Cycles Index</h1>

    <a href="{{ route('cycles.create') }}" class="btn btn-primary">Create New Cycle</a>
    <p></p>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Time Start</th>
            <th scope="col">Time End</th>
            <th scope="col">View</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($cycles as $cycle)
            <tr>
                <td>{{ $cycle->date }}</td>
                <td>{{ $cycle->time_start }}</td>
                <td>{{ $cycle->time_end }}</td>
                <td><a href="{{ route('cycles.show', $cycle) }}" class="btn btn-info">View</a></td>
                <td><a href="{{ route('cycles.edit', $cycle) }}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{ route('cycles.destroy', $cycle) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection

