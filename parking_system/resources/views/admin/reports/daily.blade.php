@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Daily Parking Report</h3>

        <table class="table table-bordered mt-3">
            <thead>
            <tr>
                <th>#</th>
                <th>Vehicle No</th>
                <th>Entry Time</th>
                <th>Exit Time</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            @forelse($logs as $log)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $log->vehicle_no }}</td>
                    <td>{{ $log->entry_time }}</td>
                    <td>{{ $log->exit_time ?? '—' }}</td>
                    <td>{{ $log->amount ?? 0 }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        No records found
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
