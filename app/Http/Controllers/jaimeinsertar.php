<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class jaimeinsertar extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'campo1' => 'required|string|max:255', // Ajusta las reglas según tus campos
            'campo2' => 'required|email',          // Ejemplo de validación para un email
            // Agrega otras reglas de validación para tus campos
        ]);

        // Crear una nueva instancia del modelo
        $registro = new User(); // Reemplaza 'TuModelo' por el nombre de tu modelo

        // Asignar los valores del formulario a los campos del modelo
        $registro->campo1 = $request->input('campo1');
        $registro->campo2 = $request->input('campo2');
        // Asigna otros campos si es necesario

        // Guardar los datos en la base de datos
        $registro->save();

        // Redireccionar al usuario o devolver una respuesta
        return redirect()->back()->with('success', 'Datos insertados correctamente');
    }
}
