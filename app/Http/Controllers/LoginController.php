<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authanticate(Request $request)
    {

        $login = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($login)) {
            $request->session()->regenerate();

            return redirect()->intended('https://hidayatmramon.hidayatmramon.repl.co/my%20portfolio/ramon.html');
        }

        return back()->with('loginError', 'Login gagal! Silahkan coba lagi');
    }
}