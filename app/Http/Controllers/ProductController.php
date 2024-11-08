<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('products.index')->with('success', 'PRODUCTO CREADO CORRECTAMENTE');
    }

    public function index()
    {
        $products = Product::simplePaginate(3);
        return view('products.index', compact('products'));
    }

public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
    ]);

    $product = Product::findOrFail($id);
    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'quantity' => $request->quantity,
    ]);

    return redirect()->route('products.index')->with('success', 'PRODUCTO ACTUALIZADO CORRECTAMENTE');
}

public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index')->with('success', 'PRODUCTO ELIMINADO CORRECTAMENTE');
}
}

