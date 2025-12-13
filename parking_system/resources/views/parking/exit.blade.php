@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Vehicle Exit</h2>
        <form action="{{ route('exit.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="vehicle_number" class="form-label">Vehicle Number</label>
                <input type="text" name="vehicle_number" class="form-control" id="vehicle_number" required>
            </div>
            <button type="submit" class="btn btn-danger">Exit Vehicle</button>
        </form>
    </div>
@endsection
