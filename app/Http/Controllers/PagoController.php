<?php

namespace App\Http\Controllers;
use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::all();
        return view('CRUDS_proy.pagos.index', compact('pagos'));
    }

    public function create()
    {
        return view('CRUDS_proy.pagos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
            'metodo_pago' => 'required|string|max:255',
        ]);
    Pago::create($request->all());

        return redirect()->route('pagos.index')->with('success', 'Pago creado exitosamente.');
    }
    public function edit($id)
    {
        $pago = Pago::findOrFail($id);
        return view('CRUDS_proy.pagos.edit', compact('pago'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cliente' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
            'metodo_pago' => 'required|string|max:255',
        ]);

        $pago = Pago::findOrFail($id);
        $pago->update($request->all());

        return redirect()->route('pagos.index')->with('success', 'Pago actualizado exitosamente.');
    }
    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();

        return redirect()->route('pagos.index')->with('success', 'Pago eliminado exitosamente.');
    }
}
