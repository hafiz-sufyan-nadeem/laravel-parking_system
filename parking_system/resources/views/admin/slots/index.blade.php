@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>All Slots</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.slots.create') }}" class="btn btn-primary mb-3">Add New Slot</a>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Slot Name / Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($slots as $slot)
                <tr>
                    <td>{{ $slot->id }}</td>
                    <td>{{ $slot->slot_type }}</td>
                    <td>
                        @if($slot->is_occupied)
                            <span class="badge bg-danger">Occupied</span>
                        @else
                            <span class="badge bg-success">Free</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.slots.edit', $slot->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.slots.destroy', $slot->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
