<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $u = $request->username;
        $p = $request->password;

        if($u == 'admin' && $p == 'admin123'){
            session(['user' => 'admin', 'role' => 'admin']);
            return redirect()->route('products.index');
        } elseif($u == 'user' && $p == 'user123'){
            session(['user' => 'user', 'role' => 'user']);
            return redirect()->route('products.index');
        }
        return redirect()->back()->with('error', 'Login Gagal! Periksa username dan password anda.');
    }

    public function logout(Request $request){
            session()->flush();
            return redirect()->route('login.form');
        }
}
