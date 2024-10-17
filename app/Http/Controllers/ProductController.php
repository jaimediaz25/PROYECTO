<?php

// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Mostrar el formulario de creación
    public function create()
    {
        return view('products.create');
    }

    // Almacenar un producto en la base de datos
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

    // Mostrar todos los productos
    public function index()
    {
        //$products = Product::all();
        $products = Product::simplePaginate(3);
        return view('products.index', compact('products'));
    }

    // Mostrar el formulario para editar un producto
public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
}

// Actualizar los datos del producto en la base de datos
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

//Eliminar el producto
public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index')->with('success', 'PRODUCTO ELIMINADO CORRECTAMENTE');
}
}

