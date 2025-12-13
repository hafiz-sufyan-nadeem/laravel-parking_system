@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Welcome to Parking Management System</h1>

        <div class="mt-4 text-center">
            <p>Total Slots: {{ $totalSlots }}</p>
            <p>Occupied Slots: {{ $occupiedSlots }}</p>
            <p>Free Slots: {{ $freeSlots }}</p>
        </div>
    </div>
@endsection
