@extends('layouts.app')

@section('content')
    <h1>Order Types Index</h1>

    <a href="{{ route('order-types.create') }}" class="btn btn-primary">Create New Type</a>
    <p></p>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Type name</th>
                <th scope="col">View</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($orderTypes as $orderType)
            <tr>
                <td>{{ $orderType->name }}</td>
                <td><a href="{{ route('order-types.show', $orderType) }}" class="btn btn-info">View</a></td>
                <td><a href="{{ route('order-types.edit', $orderType) }}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{ route('order-types.destroy', $orderType) }}" method="POST" style="display:inline;">
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

