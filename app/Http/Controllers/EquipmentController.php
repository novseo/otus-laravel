<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipments = Equipment::all();
        return view('equipments.index', compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipmentRequest $request)
    {
        $this->authorize('create', Equipment::class);

        $validatedData = $request->validate([
            'name'   => 'required|string|max:255',
            'levels' => 'required|numeric|min:1',
            'width'  => 'required|numeric|min:0',
            'length' => 'required|numeric|min:0',
        ]);

        Equipment::create($validatedData);
        return redirect()->route('equipments.index')->with('success', 'Equipment created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Equipment $equipment)
    {
        return view('equipments.show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipment $equipment)
    {
        return view('equipments.edit', compact('equipment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        $this->authorize('update', $equipment);

        $validatedData = $request->validate([
            'name'   => 'required|string|max:255',
            'levels' => 'required|numeric|min:1',
            'width'  => 'required|numeric|min:0',
            'length' => 'required|numeric|min:0',
        ]);

        $equipment->update($validatedData);
        return redirect()->route('equipments.index')->with('success', 'Equipment updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return redirect()->route('equipments.index')->with('success', 'Equipment deleted successfully.');

    }
    private function authorize(string $string, string $class)
    {
    }
}
