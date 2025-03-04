<?php

namespace App\Http\Controllers;

use App\Models\OrderType;
use App\Http\Requests\StoreOrderTypeRequest;
use App\Http\Requests\UpdateOrderTypeRequest;

class OrderTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderTypes = OrderType::all();
        return view('order-types.index', compact('orderTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderTypeRequest $request)
    {
        $this->authorize('create', OrderType::class);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        OrderType::create($validatedData);
        return redirect()->route('order-types.index')->with('success', 'Order type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderType $orderType)
    {
        return view('order-types.show', compact('orderType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderType $orderType)
    {
        return view('order-types.edit', compact('orderType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderTypeRequest $request, OrderType $orderType)
    {
        $this->authorize('update', $orderType);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $orderType->update($validatedData);
        return redirect()->route('order-types.index')->with('success', 'Order type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderType $orderType)
    {
        $orderType->delete();
        return redirect()->route('order-types.index')->with('success', 'Order type deleted successfully.');
    }

    private function authorize(string $string, string $class)
    {
    }
}
