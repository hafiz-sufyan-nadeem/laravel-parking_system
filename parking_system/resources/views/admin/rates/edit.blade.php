@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Rate</h1>

        <form action="{{ route('admin.rates.update', $rate->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Vehicle Type</label>
                <input type="text" name="vehicle_type" class="form-control"
                       value="{{ $rate->vehicle_type }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Rate</label>
                <input type="number" name="price" class="form-control"
                       value="{{ $rate->price }}" required>
            </div>

            <button class="btn btn-success">Update</button>
            <a href="{{ route('admin.rates.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
