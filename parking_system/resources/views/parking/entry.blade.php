@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mt-6 fw-bold">Vehicle Entry</h2>
        @if(session('success'))
            <div>{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div>{{ session('error') }}</div>
        @endif
        <form action="{{ route('entry.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="vehicle_number" class="form-label">Vehicle Number</label>
                <input type="text" name="vehicle_number" class="form-control" id="vehicle_number" required>
            </div>
            <div class="mb-3">
                <label for="vehicle_type" class="form-label">Vehicle Type</label>
                <select name="vehicle_type" class="form-control" id="vehicle_type" required>
                    <option value="">Select Type</option>
                    <option value="car">Car</option>
                    <option value="bike">Bike</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enter Vehicle</button>
        </form>
    </div>
@endsection
