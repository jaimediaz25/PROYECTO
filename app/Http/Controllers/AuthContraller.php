<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthContraller extends Controller
{
    
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            
            return redirect()->route('listamenu')->with('success', '¡Bienvenido!');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }

}
