@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        {{-- Page Heading --}}
        <div class="mb-4">
            <h2 class="fw-bold">Admin Dashboard</h2>
            <p class="text-muted">
                Manage parking slots, rates, and system reports
            </p>
        </div>

        {{-- Dashboard Cards --}}
        <div class="row g-4">

            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <h5 class="fw-semibold">Slots Management</h5>
                        <p class="text-muted small">
                            Add, update, or remove parking slots
                        </p>
                        <a href="{{ route('admin.slots.index') }}"
                           class="btn btn-outline-primary mt-2">
                            Manage Slots
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <h5 class="fw-semibold">Rates & Pricing</h5>
                        <p class="text-muted small">
                            Set parking rates and pricing rules
                        </p>
                        <a href="{{ route('admin.rates.index') }}"
                           class="btn btn-outline-success mt-2">
                            Set Rates
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <h5 class="fw-semibold">Daily Reports</h5>
                        <p class="text-muted small">
                            View daily parking and revenue reports
                        </p>
                        <a href="{{ route('admin.reports.daily') }}"
                           class="btn btn-outline-dark mt-2">
                            View Reports
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
