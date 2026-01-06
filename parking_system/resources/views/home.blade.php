@extends('layouts.app')

@section('content')

    {{-- Hero Section with Image --}}
    <div class="position-relative" style="
    background-image: url('{{ asset('images/parking.jpg') }}');
    background-size: cover;
    background-position: center;
    height: 71vh;

">
        <div class="position-absolute top-0 start-0 w-100 h-100"
             style="background: rgba(0,0,0,0.55);">
        </div>

        <div class="container h-100 d-flex align-items-center justify-content-center position-relative">
            <div class="text-center text-white">
                <h1 class="fw-bold display-5">
                    Smart Parking Management System
                </h1>
                <p class="mt-3">
                    Efficient vehicle parking, slot tracking, and fee management
                </p>

                <a href="{{ route('login') }}" class="btn btn-success mt-3 px-4">
                    Enter System
                </a>
            </div>
        </div>
    </div>

    {{-- Stats Section --}}
    <div class="container mt-5">
        <div class="row text-center">

            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted">Total Slots</h6>
                        <h2 class="fw-bold">{{ $totalSlots }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted">Occupied Slots</h6>
                        <h2 class="fw-bold text-danger">{{ $occupiedSlots }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="text-muted">Available Slots</h6>
                        <h2 class="fw-bold text-success">{{ $freeSlots }}</h2>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
