<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use App\Http\Requests\StoreCycleRequest;
use App\Http\Requests\UpdateCycleRequest;

class CycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cycles = Cycle::all();
        return view('cycles.index', compact('cycles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cycles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCycleRequest $request)
    {
        $this->authorize('create', Cycle::class);

        $validatedData = $request->validate([
            'date' => 'required|date',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i|after:time_start',
        ]);

        Cycle::create($validatedData);
        return redirect()->route('cycles.index')->with('success', 'Cycle created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Cycle $cycle)
    {
        return view('cycles.show', compact('cycle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cycle $cycle)
    {
        return view('cycles.edit', compact('cycle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCycleRequest $request, Cycle $cycle)
    {
        $this->authorize('update', $cycle);


        $validatedData = $request->validate([
            'date' => 'required|date',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i|after:time_start',
        ]);

        $cycle->update($validatedData);
        return redirect()->route('cycles.index')->with('success', 'Cycle updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cycle $cycle)
    {
        $cycle->delete();
        return redirect()->route('cycles.index')->with('success', 'Cycle deleted successfully.');

    }

    private function authorize(string $string, string $class)
    {
    }
}
