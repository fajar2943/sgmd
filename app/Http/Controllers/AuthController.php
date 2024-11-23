<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt($request->only('email', 'password'), true)){ //remember me = true
            return redirect('/admin');
        }
        return redirect()->back()->with('Failed', 'Email atau password salah.');
    }
    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
