<?php

namespace App\Http\Controllers;

use App\Models\JenisKomponen;
use Illuminate\Http\Request;

class JenisKomponenController extends Controller
{
    public function index()
    {
        $jenisKomponens = JenisKomponen::latest()->get();
        // Memuat view dari 'resources/views/jenis_komponen/index.blade.php'
        return view('jenis_komponen.index', compact('jenisKomponens'));
    }

    public function create()
    {
        // Memuat view dari 'resources/views/jenis_komponen/create.blade.php'
        return view('jenis_komponen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jenis' => 'required|string|max:255|unique:jenis_komponen,nama_jenis',
        ]);

        JenisKomponen::create($validated);

        return redirect()->route('admin.jenis_komponen.index')->with('success', 'Jenis komponen berhasil ditambahkan.');
    }

    public function edit(JenisKomponen $jenis_komponen)
    {
        // INI BAGIAN YANG DIPERBAIKI: pastikan memanggil view yang benar
        // Memuat view dari 'resources/views/jenis_komponen/edit.blade.php'
        return view('jenis_komponen.edit', compact('jenis_komponen'));
    }

    public function update(Request $request, JenisKomponen $jenis_komponen)
    {
        $validated = $request->validate([
            'nama_jenis' => 'required|string|max:255|unique:jenis_komponen,nama_jenis,' . $jenis_komponen->id,
        ]);

        $jenis_komponen->update($validated);

        return redirect()->route('admin.jenis_komponen.index')->with('success', 'Jenis komponen berhasil diperbarui.');
    }

    public function destroy(JenisKomponen $jenis_komponen)
    {
        if ($jenis_komponen->komponen()->count() > 0) {
            return redirect()->route('admin.jenis_komponen.index')->with('error', 'Jenis komponen tidak dapat dihapus karena masih digunakan oleh produk lain.');
        }

        $jenis_komponen->delete();

        return redirect()->route('admin.jenis_komponen.index')->with('success', 'Jenis komponen berhasil dihapus.');
    }
}