<?php

namespace App\Http\Controllers;

use App\Models\Komponen;
use App\Models\JenisKomponen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Pastikan ini ada

class KomponenController extends Controller
{
    public function index()
    {
        $Komponens = Komponen::with('jenisKomponen')->latest()->get();
        return view('komponen.index', compact('Komponens'));
    }

    public function create()
    {
        $jenis_komponen = JenisKomponen::all();
        return view('komponen.create', compact('jenis_komponen'));
    }

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
            // Gunakan disk 'uploads'
            $path = $request->file('gambar')->store('komponen', 'uploads');
            $validated['gambar'] = basename($path);
        }

        Komponen::create($validated);

        return redirect()->route('komponen.index')->with('success', 'Komponen berhasil ditambahkan');
    }

    public function show(Komponen $komponen)
    {
        return view('komponen.show', compact('komponen'));
    }

    public function edit(Komponen $komponen)
    {
        $jenis_komponen = JenisKomponen::all();
        return view('komponen.edit', compact('komponen', 'jenis_komponen'));
    }

    public function update(Request $request, Komponen $komponen)
    {
        $validatedData = $request->validate([
            'nama_komponen' => 'required|string|max:255',
            'jenis_komponen_id' => 'required|exists:jenis_komponen,id',
            'harga_komponen' => 'required|numeric',
            'stok_komponen' => 'required|integer',
        ]);

        if ($request->hasFile('gambar')) {
            $request->validate(['gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            
            // Hapus dari disk 'uploads'
            if ($komponen->gambar) {
                Storage::disk('uploads')->delete('komponen/' . $komponen->gambar);
            }
            
            // Simpan ke disk 'uploads'
            $path = $request->file('gambar')->store('komponen', 'uploads');
            $validatedData['gambar'] = basename($path);
        }

        $komponen->update($validatedData);

        return redirect()->route('komponen.index')->with('success', 'Komponen berhasil diperbarui.');
    }

    public function destroy(Komponen $komponen)
    {
        // Hapus dari disk 'uploads'
        if ($komponen->gambar) {
            Storage::disk('uploads')->delete('komponen/' . $komponen->gambar);
        }
        
        $komponen->delete();

        return redirect()->route('komponen.index')->with('success', 'Komponen berhasil dihapus');
    }
}