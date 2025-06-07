<?php
namespace App\Http\Controllers;

use App\Models\Komponen;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil semua data komponen
        $komponen = Komponen::all();

        // Mengirim data ke view 'dashboard'
        return view('dashboard', compact('komponen'));
    }
}
