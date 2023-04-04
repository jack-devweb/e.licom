<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $products = Product::all();
    return view('products.index', compact('products'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = Category::all();
    $subcategories = Subcategory::all();
    return view('products.create', compact('categories', 'subcategories'));
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'category_id' => 'required',
        'subcategory_id' => 'required'
    ]);
    $product = new Product();
    $product->name = $validatedData['name'];
    $product->description = $validatedData['description'];
    $product->price = $validatedData['price'];
    $product->category_id = $validatedData['category_id'];
    $product->subcategory_id = $validatedData['subcategory_id'];
    $product->save();

    return redirect()->route('products.index')
        ->with('success', 'Product created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $product = Product::findOrFail($id);
    return view('products.show', compact('product'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();
    $subcategories = Subcategory::all();
    return view('products.edit', compact('product', 'categories', 'subcategories'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'category_id' => 'required',
        'subcategory_id' => 'required'
    ]);

    $product = Product::findOrFail($id);
    $product->name = $validatedData['name'];
    $product->description = $validatedData['description'];
    $product->price = $validatedData['price'];
    $product->category_id = $validatedData['category_id'];
    $product->subcategory_id = $validatedData['subcategory_id'];
    $product->save();

    return redirect()->route('products.index')
        ->with('success', 'Product updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index')
        ->with('success', 'Product deleted successfully.');
}
}
