<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKomponen;

class JenisKomponenController extends Controller
{
        public function index()
    {
        $jenisKomponens = JenisKomponen::all();
        return view('jenis_komponen.index', compact('jenisKomponens'));
    }
}
