<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return view('register');
    }
    public function post_register(Request $request)
    {
        $validate = $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required|min:8',
            'confirm_password'  => 'required|same:password'
        ]);
        User::create($request->all());
        return redirect()->route('login');
    }
    public function login(Request $request)
    {
        return view('login');
    }
    public function post_login(Request $request)
    {
        $credetntial = $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'Credential yang anda masuukan tidak sesuai...',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
