<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            // if ($user->role == 'admin') {
            //     return redirect()->intended('admin/dashboard');
            // } else if ($user->role == 'author') {
            //     return redirect()->intended('author');
            // }
            return redirect()->intended('/dashboard');
        }
        return view('login.view_login');
    }
    public function proses(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            // ['username.required' => 'username cannot be empty'],
        );

        $kredensial = $request->only('username', 'password');
        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->intended('admin/dashboard');
            } else if ($user->role == 'author') {
                return redirect()->intended('/dashboard');
            }

            return redirect()->intended('/');
        }
        return back()->withErrors([
            'username' => 'Maaf username atau password anda salah'
        ])->onlyInput('username');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function register()
    {
        return view('login.view_register');
    }
}
