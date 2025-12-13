@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Parking Receipt</h2>
        <p><strong>Vehicle Number:</strong> {{ $log->vehicle_number }}</p>
        <p><strong>Slot:</strong> {{ $log->slot->name }}</p>
        <p><strong>Entry:</strong> {{ $log->entry_time }}</p>
        <p><strong>Exit:</strong> {{ $log->exit_time }}</p>
        <p><strong>Duration:</strong> {{ $log->duration_minutes }} minutes</p>
        <p><strong>Fee:</strong> ${{ $log->fee_paid }}</p>
        <a href="{{ route('home') }}" class="btn btn-primary mt-3">Back to Home</a>
    </div>
@endsection
