<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class Usuario2Controller extends Controller
{
    public function create()
    {
        return view('CRUDS_proy.usuarios.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:usuarios',
            'contrasena' => 'required|min:6',
            'role' => 'required|in:user,admin',
        ]);

        Usuario::create($request->all());

        return redirect()->route('usuarios.index')->with('success', 'SE AGREGO CORRECTAMENTE');
    }
    public function index()
    {
        $usuarios = Usuario::simplePaginate(5);
        return view('CRUDS_proy.usuarios.index', compact('usuarios'));
    }
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('CRUDS_proy.usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'contrasena' => 'nullable|min:6',
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());

        return redirect()->route('usuarios.index')->with('success', 'SE ACTUALIZO CORRECTAMENTE.');
    }
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'SE ELIMINO CORRECTAMENTE.');
    }
}
