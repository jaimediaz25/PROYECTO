<?php

namespace App\Http\Controllers;
use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::simplePaginate(5);
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

        try {
            $pago = Pago::create([
                'cliente' => $request->cliente,
                'monto' => $request->monto,
                'metodo_pago' => $request->metodo_pago,
            ]);
            return redirect()->route('pagos.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Hubo un error al procesar el pago.']); 
        }
    }

    public function edit($id)
    {
        $pago = Pago::findOrFail($id);
        return view('CRUDS_proy.pagos.edit', compact('pago'));
    }

    public function update(Request $request, $id)
    {
        $pago = Pago::find($id);
        $validated = $request->validate([
            'cliente' => 'required|string|max:255',
            'monto' => 'required|numeric',
            'metodo_pago' => 'required|string|max:255',
        ]);
        $pago->cliente = $request->input('cliente');
        $pago->monto = $request->input('monto');
        $pago->metodo_pago = $request->input('metodo_pago');
        $pago->save();
        return redirect()->route('pagos.index');
    }
    
    public function destroy($id)
    {
        $pago = Pago::find($id);
        if ($pago) {
            $pago->delete();
            return redirect()->route('pagos.index');
        }
        return redirect()->route('pagos.index');
    }
}
