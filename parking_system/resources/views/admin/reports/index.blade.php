@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Reports</h3>

        <ul>
            <li>
                <a href="{{ route('admin.reports.daily') }}">
                    Daily Report
                </a>
            </li>
        </ul>
    </div>
@endsection
