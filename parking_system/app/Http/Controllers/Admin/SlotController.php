<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function index()
    {
        $slots = Slot::all();
        return view('admin.slots.index', compact('slots'));
    }

    public function create()
    {
        return view('admin.slots.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slot_type' => 'required',
        ]);

        Slot::create([
            'name' => $request->name,
            'slot_type' => $request->slot_type,
            'is_occupied' => false,
        ]);

        return redirect()->route('admin.slots.index')->with('success', 'Slot created successfully.');
    }


    public function edit(Slot $slot)
    {
        return view('admin.slots.edit', compact('slot'));
    }

    public function update(Request $request, Slot $slot)
    {
        $request->validate([
            'name' => 'required',
            'slot_type' => 'required',
        ]);

        $slot->update([
            'name' => $request->name,
            'slot_type' => $request->slot_type,
        ]);

        return redirect()->route('admin.slots.index')->with('success', 'Slot updated successfully.');
    }


    public function destroy(Slot $slot)
    {
        $slot->delete();
        return redirect()->route('admin.slots.index')->with('success', 'Slot deleted successfully.');
    }
}
