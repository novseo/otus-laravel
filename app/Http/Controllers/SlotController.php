<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use App\Http\Requests\StoreSlotRequest;
use App\Http\Requests\UpdateSlotRequest;


class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slots = Slot::all();
        return view('slots.index', compact('slots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('slots.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSlotRequest $request)
    {
        $this->authorize('create', Slot::class);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'width' => 'required|numeric|min:0',
            'length' => 'required|numeric|min:0',
        ]);

        Slot::create($validatedData);
        return redirect()->route('slots.index')->with('success', 'Slot created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Slot $slot)
    {
        return view('slots.show', compact('slot'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slot $slot)
    {
        return view('slots.edit', compact('slot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSlotRequest $request, Slot $slot)
    {
        $this->authorize('update', $slot);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'width' => 'required|numeric|min:0',
            'length' => 'required|numeric|min:0',
        ]);

        $slot->update($validatedData);
        return redirect()->route('slots.index')->with('success', 'Slot updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slot $slot)
    {
        $slot->delete();
        return redirect()->route('slots.index')->with('success', 'Slot deleted successfully.');
    }
    private function authorize(string $string, string $class)
    {

    }
}
