<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ParkingLog;
use App\Models\Slot;
use App\Models\Rate;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    public function home()
    {
        // Current slots info
        $totalSlots = Slot::count();
        $occupiedSlots = Slot::where('is_occupied', true)->count();
        $freeSlots = $totalSlots - $occupiedSlots;

        return view('home', compact('totalSlots','occupiedSlots','freeSlots'));
    }

    public function entryForm()
    {
        $availableSlots = Slot::where('is_occupied', false)->count();
        return view('parking.entry', compact('availableSlots'));
    }

    public function exitForm()
    {
        return view('parking.exit');
    }


    public function storeEntry(Request $request){
        $request->validate([
            'vehicle_number' => 'required',
            'vehicle_type' => 'required',
        ]);

        // Find Free Slot
        $slot = Slot::where('slot_type', $request->vehicle_type)
            ->where('is_occupied', false)
            ->first();
        if (!$slot){
            return back()->with('error', 'Slot not found');
        }

        //Vehical Create
        $vehicle = Vehicle::create([
        'vehicle_number' => $request->vehicle_number,
            'vehicle_type' => $request->vehicle_type,
            'slot_id' => $slot->id,
            'entry_time' => now(),
        ]);
        $slot->update(['is_occupied' => true]);

        //create parking log
        ParkingLog::create([
            'vehicle_number' => $vehicle->vehicle_number,
            'vehicle_type'  => $vehicle->vehicle_type,
            'slot_id' => $slot->id,
            'entry_time' => now(),
        ]);
        return redirect()->back()->with('success', 'Parking entry successful');
    }

    public function storeExit(Request $request)
    {
        $request->validate([
            'vehicle_number' => 'required',
        ]);
        $vehicle = Vehicle::where('vehicle_number', $request->vehicle_number)->first();
        if (!$vehicle){
            return back()->with('error', 'Vehicle not found');
        }
        $entry = Carbon::parse($vehicle->entry_time);
        $exit = Carbon::now();

        $minutes = $exit->diffInMinutes($entry);
        $fee = $this->calculateFee($vehicle->vehicle_type, $minutes);
        // Find relevant log
        $log = ParkingLog::where('vehicle_number', $vehicle->vehicle_number)
            ->whereNull('exit_time')
            ->latest()
            ->first();

        $log->update([
            'exit_time'        => $exit,
            'duration_minutes' => $minutes,
            'fee_paid'         => $fee
        ]);

        // Slot free karna
        $slot = $vehicle->slot;
        $slot->update(['is_occupied' => false]);

        // Vehicle record delete kar dena
        $vehicle->delete();

        return view('parking.receipt', compact('log'));
}
    private function calculateFee($type, $minutes)
    {
        $rate = Rate::where('slot_type', $type)->first();

        $hours = ceil($minutes / 60);

        if($hours <= 1){
            return $rate->first_hour_fee;
        }

        return $rate->first_hour_fee + ($hours - 1) * $rate->per_hour_fee;
    }


}
