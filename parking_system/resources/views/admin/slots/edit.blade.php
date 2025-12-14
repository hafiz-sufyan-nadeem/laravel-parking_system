@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Edit Slot</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.slots.update', $slot->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Slot Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $slot->name }}" required>
            </div>
            <div class="mb-3">
                <label for="slot_type" class="form-label">Slot Type</label>
                <select name="slot_type" id="slot_type" class="form-control" required>
                    <option value="car" {{ $slot->slot_type=='car'?'selected':'' }}>Car</option>
                    <option value="bike" {{ $slot->slot_type=='bike'?'selected':'' }}>Bike</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update Slot</button>
            <a href="{{ route('admin.slots.index') }}" class="btn btn-secondary">Back</a>
        </form>

    </div>
@endsection
