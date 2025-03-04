<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipmentSlotRequest;
use App\Http\Requests\UpdateEquipmentSlotRequest;
use App\Models\Equipment;
use App\Models\EquipmentSlot;
use App\Models\Slot;

class EquipmentSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipment_slots = EquipmentSlot::all();
        return view('equipment_slots.index', compact('equipment_slots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $slots = Slot::all();
        $equipments = Equipment::all();
        return view('equipment_slots.create', compact('slots', 'equipments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipmentSlotRequest $request)
    {
        $this->authorize('create', EquipmentSlot::class);


        $validatedData = $request->validate([
            'equipment_id' => 'required|integer|exists:equipments,id',
            'slot_id' => 'required|integer|exists:slots,id',
        ]);

        EquipmentSlot::create($validatedData);
        return redirect()->route('equipment_slots.index')->with('success', 'Equipment_slot created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(EquipmentSlot $equipmentSlot)
    {
        return view('equipment_slots.show', compact('equipmentSlot'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EquipmentSlot $equipment_slot)
    {
        $slots = Slot::all();
        $equipments = Equipment::all();
        return view('equipment_slots.edit', compact('slots','equipments', 'equipment_slot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipmentSlotRequest $request, EquipmentSlot $equipment_slot)
    {
        $this->authorize('update', $equipment_slot);

        $validatedData = $request->validate([
            'equipment_id' => 'required|integer|exists:equipments,id',
            'slot_id' => 'required|integer|exists:slots,id',
        ]);

        $equipment_slot->update($validatedData);
        return redirect()->route('equipment_slots.index')->with('success', 'EquaipmentSlot updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipmentSlot $equipment_slot)
    {
        $equipment_slot->delete();
        return redirect()->route('equipment_slots.index')->with('success', 'Equipment_slot deleted successfully.');

    }
    private function authorize(string $string, string $class)
    {
    }
}
