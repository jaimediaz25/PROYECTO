<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class jaimeinsertar extends Controller
{
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'campo1' => 'required|string|max:255',
            'campo2' => 'required|email',          
            
           
        ]);

        
        $registro = new User(); 

        $registro->name = $request->input('campo1');
        $registro->email = $request->input('campo2');
        $registro->password = $request->input('campo3');
        
        $registro->save();

        return redirect()->back()->with('success', 'Datos insertados correctamente');
    }
}
