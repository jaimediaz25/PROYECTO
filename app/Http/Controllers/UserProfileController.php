<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('perfil');
    }

    public function settings()
    {
        return view('ajustes');
    }
}
