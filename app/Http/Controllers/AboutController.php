<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Menampilkan halaman "Tentang Kami".
     */
    public function index()
    {
        return view('about.index');
    }
}