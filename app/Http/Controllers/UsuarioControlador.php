<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class UsuarioControlador extends Controller
{
    public function create(){
        return view('vistas.create');
    }
}
