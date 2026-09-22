<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;
use App\Models\Kategori;

class MotorController extends Controller
{
    // USER
    public function index(Request $request)
    {
        $kategori = Kategori::all();

        $motors = Motor::with('kategori')
            ->where('status', 'tersedia')
            ->when($request->kategori, function ($query, $kategori) {
                $query->whereHas('kategori', function ($q) use ($kategori) {
                    $q->where('nama_kategori', $kategori);
                });
            })
            ->get();

        return view('motor_user.index', compact('motors', 'kategori'));
    }

    // USER DETAIL
    public function detail($id)
    {
        $motor = Motor::with('kategori')->findOrFail($id);

        return view('motor_user.detail', compact('motor'));
    }

    // ADMIN
public function adminIndex()
{
    $motor = Motor::with('kategori')->get();

    return view('admin.motor.index', compact('motor'));
}
public function create()
{
    $kategori = Kategori::all();

    return view('admin.motor.create', compact('kategori'));
}

public function store(Request $request)
{
    $request->validate([
        'nama_motor' => 'required',
        'plat_nomor' => 'required|unique:motor,plat_nomor',
        'kategori_id' => 'required|exists:kategori,id',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'cc' => 'required',
        'status' => 'required|in:tersedia,disewa,perawatan',
    ]);

    $foto = null;

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto')->store('motor', 'public');
    }

Motor::create([
    'nama_motor' => $request->nama_motor,
    'plat_nomor' => $request->plat_nomor,
    'kategori_id' => $request->kategori_id,
    'foto' => $foto,
    'cc' => $request->cc,
    'status' => $request->status,
]);

    return redirect()
        ->route('admin.motor.index')
        ->with('success', 'Data motor berhasil ditambahkan.');
}
public function edit($id)
{
    $motor = Motor::findOrFail($id);

    $kategori = Kategori::all();

    return view('admin.motor.edit', compact('motor', 'kategori'));
}
public function update(Request $request, $id)
{
    $motor = Motor::findOrFail($id);

    $request->validate([
        'nama_motor' => 'required|string|max:255',
        'plat_nomor' => 'required|string|max:20',
        'cc' => 'required|string|max:20',
        'kategori_id' => 'required|exists:kategori,id',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'status' => 'required|in:tersedia,disewa,perawatan',
    ]);

    $motor->nama_motor = $request->nama_motor;
    $motor->plat_nomor = $request->plat_nomor;
    $motor->cc = $request->cc;
    $motor->kategori_id = $request->kategori_id;
    $motor->status = $request->status;

    // Jika upload foto baru
    if ($request->hasFile('foto')) {

        // Hapus foto lama
        if ($motor->foto && file_exists(storage_path('app/public/' . $motor->foto))) {
            unlink(storage_path('app/public/' . $motor->foto));
        }

        // Simpan foto baru
        $motor->foto = $request->file('foto')->store('motor', 'public');
    }

    $motor->save();

    return redirect()
        ->route('admin.motor.index')
        ->with('success', 'Data motor berhasil diperbarui.');
}

public function destroy($id)
{
    $motor = Motor::findOrFail($id);

    // Hapus foto jika ada
    if ($motor->foto && file_exists(storage_path('app/public/' . $motor->foto))) {
        unlink(storage_path('app/public/' . $motor->foto));
    }

    // Hapus data motor
    $motor->delete();

    return redirect()
        ->route('admin.motor.index')
        ->with('success', 'Data motor berhasil dihapus.');
}
}