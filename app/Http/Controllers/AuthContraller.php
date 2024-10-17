<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthContraller extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|string|email',
            'password'=> 'required|string|'
        ]);
        if($auth=auth()->attempt(
            ['email'=>$request->email,
            'password'=>$request->password])){
                return redirect()->route('home');
            }
            return redirect()->back();
    }
     
    

}
