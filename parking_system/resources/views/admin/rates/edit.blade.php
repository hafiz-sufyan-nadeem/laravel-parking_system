@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit Rate</h1>

        <form action="{{ route('admin.rates.update', $rate->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Vehicle Type</label>
                <select name="slot_type" class="form-control" required>
                    <option value="car" {{ $rate->slot_type=='car'?'selected':'' }}>Car</option>
                    <option value="bike" {{ $rate->slot_type=='bike'?'selected':'' }}>Bike</option>
                </select>
            </div>

            <div class="mb-3">
                <label>First Hour Fee</label>
                <input type="number" name="first_hour_fee" class="form-control" value="{{ $rate->first_hour_fee }}" required>
            </div>

            <div class="mb-3">
                <label>Per Hour Fee</label>
                <input type="number" name="per_hour_fee" class="form-control" value="{{ $rate->per_hour_fee }}" required>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.rates.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
