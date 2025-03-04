<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationSlotRequest;
use App\Http\Requests\UpdateReservationSlotRequest;
use App\Models\Cycle;
use App\Models\Equipment;
use App\Models\Product;
use App\Models\ReservationSlot;

class ReservationSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservation_slots = ReservationSlot::all();
        return view('reservation_slots.index', compact('reservation_slots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $cycles = Cycle::all();
        $equipments = Equipment::all();

        return view('reservation_slots.create', compact('products', 'cycles', 'equipments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationSlotRequest $request)
    {
        $this->authorize('create', ReservationSlot::class);

        $validatedData = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'cycle_id' => 'required|integer|exists:cycles,id',
            'equipment_id' => 'required|integer|exists:equipments,id',
        ]);

        ReservationSlot::create($validatedData);
        return redirect()->route('reservation_slots.index')->with('success', 'Reservation Slot created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ReservationSlot $reservation_slot)
    {
        return view('reservation_slots.show', compact('reservation_slot'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReservationSlot $reservation_slot)
    {
        $products = Product::all();
        $cycles = Cycle::all();
        $equipments = Equipment::all();
        return view('reservation_slots.edit', compact('reservation_slot', 'products', 'cycles', 'equipments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationSlotRequest $request, ReservationSlot $reservation_slot)
    {
        $this->authorize('update', $reservation_slot);
        $validatedData = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'cycle_id' => 'required|integer|exists:cycles,id',
            'equipment_id' => 'required|integer|exists:equipments,id',
        ]);
        $reservation_slot->update($validatedData);
        return redirect()->route('reservation_slots.index')->with('success', 'Reservation Slot updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReservationSlot $reservation_slot)
    {
        $reservation_slot->delete();
        return redirect()->route('reservation_slots.index')->with('success', 'reservation_slot deleted successfully.');
    }

    private function authorize(string $string, string $class)
    {

    }
}
