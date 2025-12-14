@extends('layouts.app')
@section('content')

    <div  class="container">
        <h1>Rates</h1>

        <a href="{{ route('admin.rates.create') }}" class="btn btn-primary mb-3">
            Add New Rate
        </a>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Vehicle Type</th>
                <th>Rate</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($rates ?? [] as $rate)
                <tr>
                    <td>{{ $rate->id }}</td>
                    <td>{{ $rate->vehicle_type }}</td>
                    <td>{{ $rate->price }}</td>
                    <td>
                        <a href="{{ route('admin.rates.edit', $rate->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No rates found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
