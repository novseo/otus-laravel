<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIngredientProductRequest;
use App\Http\Requests\UpdateIngredientProductRequest;
use App\Models\Ingredient;
use App\Models\IngredientProduct;
use App\Models\Product;

class IngredientProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredient_products = IngredientProduct::all();
        return view('ingredient_products.index', compact('ingredient_products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $ingredients = Ingredient::all();
        return view('ingredient_products.create', compact('ingredients', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIngredientProductRequest $request)
    {
        $this->authorize('create', IngredientProduct::class);


        $validatedData = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'ingredient_id' => 'required|integer|exists:ingredients,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        IngredientProduct::create($validatedData);
        return redirect()->route('ingredient_products.index')->with('success', 'Ingredient_product created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(IngredientProduct $ingredient_product)
    {
        return view('ingredient_products.show', compact('ingredient_product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IngredientProduct $ingredient_product)
    {
        $ingredients = Ingredient::all();
        $products = Product::all();
        return view('ingredient_products.edit', compact('ingredients','products', 'ingredient_product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIngredientProductRequest $request, IngredientProduct $ingredient_product)
    {
        $this->authorize('update', $ingredient_product);

        $validatedData = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'ingredient_id' => 'required|integer|exists:ingredients,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        $ingredient_product->update($validatedData);
        return redirect()->route('ingredient_products.index')->with('success', 'Ingredient product updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IngredientProduct $ingredient_product)
    {
        $ingredient_product->delete();
        return redirect()->route('ingredient_products.index')->with('success', 'Ingredient product deleted successfully.');

    }

    private function authorize(string $string, string $class)
    {
    }
}
