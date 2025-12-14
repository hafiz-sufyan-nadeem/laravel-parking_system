@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>User Dashboard</h2>
        <p>Welcome, {{ auth()->user()->name }}</p>

        <a href="{{ route('entry.form') }}" class="btn btn-primary mt-3">
            Entry System
        </a>
    </div>
@endsection
