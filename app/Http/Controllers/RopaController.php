<?php

namespace App\Http\Controllers;
use App\Models\Ropa;
use Illuminate\Http\Request;

class RopaController extends Controller
{
    public function create()
    {
        return view('CRUDS_proy.ropa.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ]);
        Ropa::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);
        return redirect()->route('ropa.index')->with('success', 'SE AGREGO CORRECTAMENTE');
    }
    public function index()
    {
        $ropas = Ropa::all();
        return view('CRUDS_proy.ropa.index', compact('ropas'));
    }
    public function edit($id)
    {
        $ropas = Ropa::findOrFail($id);
        return view('CRUDS_proy.ropa.edit', compact('ropas'));
    }
    public function update(Request $request, $id)
    {
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
    ]);

    $ropas = Ropa::findOrFail($id);
    $ropas->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'quantity' => $request->quantity,
    ]);
    return redirect()->route('ropa.index')->with('success', 'ACTUALIZADO CORRECTAMENTE');
    }
    public function destroy($id)
    {
    $ropas = Ropa::findOrFail($id);
    $ropas->delete();

    return redirect()->route('ropa.index')->with('success', 'ELIMINADO CORRECTAMENTE');
    }
}
