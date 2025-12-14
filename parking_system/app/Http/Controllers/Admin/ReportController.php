<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParkingLog;


class ReportController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }

    public function daily()
    {
        $today = now()->toDateString();

        $logs = ParkingLog::whereDate('entry_time', $today)->get();

        $totalRevenue = $logs->sum('fee_paid');

        return view('admin.reports.daily', compact('logs', 'totalRevenue'));
    }

}
