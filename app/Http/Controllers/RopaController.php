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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1'
        ]);

        try {
            $ropa = Ropa::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
            ]);
            return redirect()->route('ropa.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Hubo un error al agregar el producto.']);
        }
    }


    public function index()
    {
        $ropas = Ropa::simplePaginate(5);
        return view('CRUDS_proy.ropa.index', compact('ropas'));
    }
    public function edit($id)
    {
        $ropas = Ropa::findOrFail($id);
        return view('CRUDS_proy.ropa.edit', compact('ropas'));
    }

    public function update(Request $request, $id)
    {
        $ropas = Ropa::find($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);
        $ropas->name = $request->input('name');
        $ropas->description = $request->input('description');
        $ropas->price = $request->input('price');
        $ropas->quantity = $request->input('quantity');
        $ropas->save();
        return redirect()->route('ropa.index');
    }


    public function destroy($id)
    {
        $ropa = Ropa::find($id);
        if ($ropa) {
            $ropa->delete();
            return redirect()->route('ropa.index');
        }
        return redirect()->route('ropa.index');
    }

}
