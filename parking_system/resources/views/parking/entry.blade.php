@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="max-width: 600px;">

        <div class="mb-4">
            <h3 class="fw-bold">Vehicle Entry</h3>
            <p class="text-muted">
                Register vehicle entry into the parking system
            </p>
        </div>

        {{-- Alerts --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <div class="alert alert-info text-center">
            Available Slots: <strong>{{ $availableSlots }}</strong>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('entry.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Vehicle Number
                        </label>
                        <input type="text"
                               name="vehicle_number"
                               class="form-control"
                               placeholder="e.g. ABC-123"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Vehicle Type
                        </label>
                        <select name="vehicle_type" class="form-select" required>
                            <option value="">Select Type</option>
                            <option value="car">Car</option>
                            <option value="bike">Bike</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Enter Vehicle
                    </button>

                </form>

            </div>
        </div>

    </div>
@endsection
