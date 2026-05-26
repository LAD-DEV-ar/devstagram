<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $request->validate([
            'name' => 'required|max:30',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ], [
            'name.required' => 'El nombre es obligatorio',
            'name.max' => 'Ese nombre es demasiado largo',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Auth::attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('posts.index');
    }
}
