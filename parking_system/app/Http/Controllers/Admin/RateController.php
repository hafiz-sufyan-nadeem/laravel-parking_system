<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function index()
    {
        $rates = Rate::all();
        return view('admin.rates.index', compact('rates'));
    }

    public function create()
    {
        return view('admin.rates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slot_type' => 'required',
            'first_hour_fee' => 'required|numeric',
            'per_hour_fee' => 'required|numeric',
        ]);

        Rate::create([
            'slot_type' => $request->slot_type,
            'first_hour_fee' => $request->first_hour_fee,
            'per_hour_fee' => $request->per_hour_fee,
        ]);

        return redirect()->route('admin.rates.index')->with('success','Rate created successfully.');
    }

    public function edit(Rate $rate)
    {
        return view('admin.rates.edit', compact('rate'));
    }

    public function update(Request $request, Rate $rate)
    {
        $request->validate([
            'slot_type' => 'required',
            'first_hour_fee' => 'required|numeric',
            'per_hour_fee' => 'required|numeric',
        ]);

        $rate->update([
            'slot_type' => $request->slot_type,
            'first_hour_fee' => $request->first_hour_fee,
            'per_hour_fee' => $request->per_hour_fee,
        ]);

        return redirect()->route('admin.rates.index')->with('success','Rate updated successfully.');
    }

    public function destroy(Rate $rate)
    {
        $rate->delete();
        return redirect()->route('admin.rates.index')->with('success','Rate deleted successfully.');
    }
}
