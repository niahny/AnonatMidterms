<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
        {
        $validated = $request->validate([
        'productname' => 'required',
        'category' => 'required',
        'price' => 'required',
        'stock_quantity' => 'required',
        'description' => 'required',
        'manufacturer' => 'required'

    ]);

    $product = Product::create($validated);

    return redirect()->route('dashboard')->with('success', 'Product added successfully');
    }

    public function destroy($id)
    {
    $product = product::findOrFail($id);
    $product->delete();

    return redirect()->route('dashboard')->with('deleted', 'Product deleted successfully!');
}

    public function edit(Product $product)
    {
        return view('edit-product', compact('product'));
}

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'productname' => 'required',
            'category' => 'required',
            'price' => 'required',
            'stock_quantity' => 'required',
            'description' => 'required',
            'manufacturer' => 'required'
        ]);

        $product->update($validated);

        return redirect()->route('dashboard')->with('success', 'Product Updated Successfully');
    }
}
