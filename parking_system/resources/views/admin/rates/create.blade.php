@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Add Rate</h1>
        <form action="{{ route('admin.rates.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Vehicle Type</label>
                <select name="slot_type" class="form-control" required>
                    <option value="">Select Type</option>
                    <option value="car">Car</option>
                    <option value="bike">Bike</option>
                </select>
            </div>

            <div class="mb-3">
                <label>First Hour Fee</label>
                <input type="number" name="first_hour_fee" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Per Hour Fee</label>
                <input type="number" name="per_hour_fee" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('admin.rates.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
