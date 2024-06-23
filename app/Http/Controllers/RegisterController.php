<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'fullname' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
        // Buat user baru
        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'full_name' => $request->fullname,
            'password' => bcrypt($request->password),
            'role' => 'author',
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Your account has been created successfully. Please login.');

        // return back()->onlyInput('email', 'username', 'fullname');
    }
    public function getData()
    {
        $admin = Auth::id();
        $users = user::select(['id', 'username', 'email', 'full_name', 'created_at', 'role'])->where('id', '!=', $admin)->get();
        // $val = $this->generateUniqueCode();
        return response()->json(['data' => $users]);
    }
    public function update($id)
    {
        $user = User::find($id);
        // Jika user tidak ditemukan, kembalikan respon error
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Update role menjadi "deleted"
        $user->role = 'deleted';
        $user->save();

        // Kembalikan respon sukses
        return redirect()->route('userAccount')->with('success', 'Article updated successfully.');
    }
}
