<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        

        $users = User::all();
        return view('pages.users', compact('users'));
    }
    public function create()
    {
        return view('pages.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_kode' => 'required|unique:tb_users',
            'user_name' => 'required|unique:tb_users',
            'user_password' => 'required|min:6',
            'user_role' => 'required',
        ]);

        User::create([
            'user_kode' => $request->user_kode,
            'user_name' => $request->user_name,
            'user_password' => Hash::make($request->user_password),
            'user_role' => $request->user_role,
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'user_kode' => 'required|unique:tb_users,user_kode,' . $id . ',user_id',
            'user_name' => 'required|unique:tb_users,user_name,' . $id . ',user_id',
            'user_role' => 'required',
        ]);

        $user->user_kode = $request->user_kode;
        $user->user_name = $request->user_name;
        if ($request->filled('user_password')) {
            $user->user_password = Hash::make($request->user_password);
        }
        $user->user_role = $request->user_role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus!');
    }
}
