<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    // function index ini berfungsi untuk menampilkan halaman index dari folder hello/register/index
    public function  index()
    {

        return view('register.index');
 
    }

    // function store ini berfungsi untuk mengirim data inputan kedalam database
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        return redirect('/register')->with('success', 'Registrasi berhasil! , silahkan Login');
    }
}