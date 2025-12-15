@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="max-width: 600px;">

        <div class="mb-4">
            <h3 class="fw-bold">Vehicle Exit</h3>
            <p class="text-muted">
                Record vehicle exit and calculate parking fee
            </p>
        </div>

        {{-- Alerts --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- Form --}}
        <div class="card shadow-sm border-0">
            <div class="card-body">

                <form action="{{ route('exit.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Vehicle Number
                        </label>
                        <input type="text"
                               name="vehicle_number"
                               class="form-control"
                               placeholder="e.g. ABC-123"
                               required>
                    </div>

                    <button type="submit" class="btn btn-danger w-100">
                        Exit Vehicle
                    </button>

                </form>

            </div>
        </div>

    </div>
@endsection
