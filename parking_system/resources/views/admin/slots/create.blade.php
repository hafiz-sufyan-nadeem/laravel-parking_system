@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Add New Slot</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.slots.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="form-label">Slot Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="A1, B1" required>
            </div>
            <div class="mb-3">
                <label for="slot_type" class="form-label">Slot Type</label>
                <select name="slot_type" id="slot_type" class="form-control" required>
                    <option value="">Select Type</option>
                    <option value="car">Car</option>
                    <option value="bike">Bike</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Slot</button>
            <a href="{{ route('admin.slots.index') }}" class="btn btn-secondary">Back</a>
        </form>

    </div>
@endsection
