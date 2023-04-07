<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function halamanlogin()
    {
        return view ('login.login');
    }

    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('email','password','level')))
        {
            /* return redirect('/'); */
            return view('admin.dashboard');
        }
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function registrasi(Request $request)
    {
        return view('login.register');
    }

    public function simpanregistrasi(Request $request)
    {
        //dd($request->all());
        User::create([
            'nama' => $request->nama,
            'level' => $request->level,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return view('login.login');
    }
}
