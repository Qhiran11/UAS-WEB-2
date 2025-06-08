<?php

namespace App\Http\Controllers;

use App\Models\Komponen;
use App\Models\JenisKomponen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KomponenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Komponens = Komponen::with('jenisKomponen')->latest()->get();
        return view('komponen.index', compact('Komponens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_komponen = JenisKomponen::all();
        return view('komponen.create', compact('jenis_komponen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_komponen' => 'required|string|max:255',
            'jenis_komponen_id' => 'required|exists:jenis_komponen,id',
            'harga_komponen' => 'required|numeric',
            'stok_komponen' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public/komponen');
            $validated['gambar'] = basename($path);
        }

        Komponen::create($validated);

        return redirect()->route('komponen.index')->with('success', 'Komponen berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Komponen $komponen)
    {
        return view('komponen.show', compact('komponen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Komponen $komponen)
    {
        $jenis_komponen = JenisKomponen::all();
        return view('komponen.edit', compact('komponen', 'jenis_komponen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Komponen $komponen)
    {
        // 1. Validasi dulu semua field selain gambar
        $validatedData = $request->validate([
            'nama_komponen' => 'required|string|max:255',
            'jenis_komponen_id' => 'required|exists:jenis_komponen,id',
            'harga_komponen' => 'required|numeric',
            'stok_komponen' => 'required|integer',
        ]);

        // 2. Cek apakah ada file gambar BARU yang di-upload
        if ($request->hasFile('gambar')) {
            // Jika ADA, validasi file gambar tersebut
            $request->validate([
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Hapus gambar lama dari storage
            if ($komponen->gambar && \Illuminate\Support\Facades\Storage::exists('public/komponen/' . $komponen->gambar)) {
                \Illuminate\Support\Facades\Storage::delete('public/komponen/' . $komponen->gambar);
            }

            // Simpan gambar baru
            $path = $request->file('gambar')->store('public/komponen');
//////new
            // Tambahkan nama file baru ke data yang akan di-update
            $validatedData['gambar'] = basename($path);
        }

        // 3. Lakukan update dengan data yang sudah divalidasi
        $komponen->update($validatedData);

        return redirect()->route('komponen.index')->with('success', 'Komponen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Komponen $komponen)
    {
        if ($komponen->gambar && Storage::exists('public/komponen/' . $komponen->gambar)) {
            Storage::delete('public/komponen/' . $komponen->gambar);
        }
        
        $komponen->delete();

        return redirect()->route('komponen.index')->with('success', 'Komponen berhasil dihapus');
    }
}