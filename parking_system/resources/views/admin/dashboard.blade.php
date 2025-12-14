@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Admin Dashboard</h1>
        <p>Manage slots, view reports, and set rates from here.</p>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-center p-3">
                    <h5>Slots</h5>
                    <a href="{{ route('admin.slots.index') }}" class="btn btn-primary mt-2">Manage Slots</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center p-3">
                    <h5>Rates</h5>
                    <a href="{{ route('admin.rates.index') }}" class="btn btn-primary mt-2">Set Rates</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center p-3">
                    <h5>Reports</h5>
                    <a href="{{ route('admin.reports.daily') }}" class="btn btn-primary mt-2">View Reports</a>
                </div>
            </div>
        </div>
    </div>
@endsection
