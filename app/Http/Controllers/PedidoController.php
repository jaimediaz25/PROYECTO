<?php

namespace App\Http\Controllers;

use App\Models\Pedido;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    { 
        $pedidos = Pedido::simplePaginate(5);
        return view('CRUDS_proy.pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        return view('CRUDS_proy.pedidos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente' => 'required|string|max:255',
            'producto' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
            'total' => 'required|numeric',
        ]);

        try {
            Pedido::create([
                'cliente' => $request->cliente,
                'producto' => $request->producto,
                'cantidad' => $request->cantidad,
                'total' => $request->total,
            ]);

            return redirect()->route('pedidos.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Hubo un error al procesar el pedido.']);
        }
    }


    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('CRUDS_proy.pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::find($id);
        $validated = $request->validate([
            'cliente' => 'required|string|max:255',
            'producto' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
            'total' => 'required|numeric',
        ]);

        $pedido->cliente = $request->input('cliente');
        $pedido->producto = $request->input('producto');
        $pedido->cantidad = $request->input('cantidad');
        $pedido->total = $request->input('total');
        $pedido->save();
        return redirect()->route('pedidos.index');
    }

    public function destroy($id)
    {
        $pedido = Pedido::find($id);

        if ($pedido) {
            $pedido->delete();
            return redirect()->route('pedidos.index'); 
        }
        return redirect()->route('pedidos.index'); 
    }
}
