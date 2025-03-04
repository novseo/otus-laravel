<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderProductRequest;
use App\Http\Requests\UpdateOrderProductRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order_products = OrderProduct::all();
        return view('order_products.index', compact('order_products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        $products = Product::all();
        return view('order_products.create', compact('orders', 'products', 'order_products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderProductRequest $request)
    {
        $this->authorize('create', OrderProduct::class);

        $validatedData = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'order_id' => 'required|integer|exists:orders,id',
        ]);

        OrderProduct::create($validatedData);
        return redirect()->route('order_products.index')->with('success', 'Order Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderProduct $order_product)
    {
        return view('order_products.show', compact('order_product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderProduct $order_product)
    {
        $orders = Order::all();
        $products = Product::all();
        return view('order_products.edit', compact( 'orders', 'products', 'order_product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderProductRequest $request, OrderProduct $order_product)
    {
        $this->authorize('update', $order_product);

        $validatedData = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'order_id' => 'required|integer|exists:orders,id',
        ]);

        $order_product->update($validatedData);
        return redirect()->route('order_products.index')->with('success', 'Order Product updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderProduct $order_product)
    {
        $order_product->delete();
        return redirect()->route('order_products.index')->with('success', 'Order Product deleted successfully.');
    }

    private function authorize(string $string, string $class)
    {

    }
}
