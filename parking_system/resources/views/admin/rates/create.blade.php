@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Rate</h1>

        <form action="{{ route('admin.rates.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Vehicle Type</label>
                <input type="text" name="vehicle_type" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Rate</label>
                <input type="number" name="price" class="form-control" required>
            </div>

            <button class="btn btn-success">Save</button>
            <a href="{{ route('admin.rates.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
