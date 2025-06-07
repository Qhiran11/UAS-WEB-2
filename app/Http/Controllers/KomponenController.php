<?php

namespace App\Http\Controllers;

use App\Models\Komponen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\JenisKomponen;






class KomponenController extends Controller
{
    public function index()
    {
        $Komponens = Komponen::all();
        return view('komponen.index', compact('Komponens'));
    }

    public function show(string $id)
    {
        $Komponens = Komponen::findOrFail($id);
        return view('komponen.show', compact('Komponens'));
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
        ]);

        Komponen::create($validated);

        return redirect()->route('komponen.index')->with('success', 'Komponen berhasil ditambahkan');
    }


    public function edit($id)
    {
        $komponen = Komponen::findOrFail($id);
        $jenis_komponen = DB::table('jenis_komponen')->get(); // Ambil jenis komponen
        return view('komponen.edit', compact('komponen', 'jenis_komponen'));
    }


    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_komponen' => 'required|string|max:255',
            'jenis_komponen_id' => 'required|exists:jenis_komponen,id',
            'harga_komponen' => 'required|numeric',
            'stok_komponen' => 'required|integer',
        ]);

        $komponen = Komponen::findOrFail($id);
        $komponen->update($validated);

        return redirect()->route('komponen.index')->with('success', 'Komponen berhasil diperbarui');
    }


    public function destroy(string $id)
    {
        $Komponens = Komponen::findOrFail($id);
        $Komponens->delete();

        return redirect()->route('komponen.index')->with('success', 'komponen berhasil dihapus');
    }

}
