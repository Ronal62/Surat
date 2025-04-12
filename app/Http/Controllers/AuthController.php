<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'user_password' => 'required',
        ]);

        $user = User::where('user_name', $request->user_name)->first();

        if ($user && Hash::check($request->user_password, $user->user_password)) {
            session(['user_id' => $user->user_id, 'user_name' => $user->user_name, 'user_role' => $user->user_role]);
            return redirect()->route('home')->with('success', 'Berhasil login!');
        }

        return back()->withErrors(['login_error' => 'Username atau password salah']);
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}