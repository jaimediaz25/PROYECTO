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
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios',
            'contrasena' => 'required|min:6',
            'role' => 'required|in:user,admin',
        ]);

        try {
            $usuario = Usuario::create([
                'nombre' => $request->nombre,
                'email' => $request->email,
                'contrasena' => bcrypt($request->contrasena),
                'role' => $request->role,
            ]);
            return redirect()->route('usuarios.index');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Hubo un error al crear el usuario.']);
        }
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
        $usuario = Usuario::find($id);
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'contrasena' => 'nullable|min:6',
        ]);

        $usuario->nombre = $request->input('nombre');
        $usuario->email = $request->input('email');
        if ($request->has('contrasena') && $request->input('contrasena') !== '') {
            $usuario->contrasena = bcrypt($request->input('contrasena'));
        }
        $usuario->save();
        return redirect()->route('usuarios.index');
    }


    public function destroy($id)
    {
        $usuario = Usuario::find($id); 
        if ($usuario) {
            $usuario->delete(); 
            return redirect()->route('usuarios.index');
        }
        return redirect()->route('usuarios.index');
    }

}
