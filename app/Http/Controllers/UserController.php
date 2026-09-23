<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $pelanggan = User::latest()->get();

        return view('admin.user.index', compact('pelanggan'));
    }
        public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6|confirmed',
            'no_telfon' => 'required|string|max:20',
            'role' => 'required|in:user,admin,petugas',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telfon' => $request->no_telfon,
            'role' => $request->role,
        ]);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil ditambahkan.');
    }
    public function edit($id)
{
    $user = User::findOrFail($id);

    return view('admin.user.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|email|unique:user,email,' . $user->id,
        'password' => 'nullable|min:6|confirmed',
        'no_telfon' => 'required|string|max:20',
        'role' => 'required|in:user,admin,petugas',
    ]);

    $user->username = $request->username;
    $user->email = $request->email;
    $user->no_telfon = $request->no_telfon;
    $user->role = $request->role;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()
        ->route('admin.user.index')
        ->with('success', 'Data user berhasil diperbarui.');
}
public function destroy($id)
{
    $user = User::findOrFail($id);

    $user->delete();

    return redirect()
        ->route('admin.user.index')
        ->with('success', 'User berhasil dihapus.');
}
}