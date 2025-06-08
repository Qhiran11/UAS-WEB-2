<?php
namespace App\Http\Controllers;

use App\Models\Komponen;
use App\Models\JenisKomponen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'komponen' => Komponen::count(),
            'jenis' => 0, // Default 0
            'users' => 0, // Default 0
        ];

        // Hanya hitung jika user adalah admin, untuk efisiensi
        if (Auth::user()->role === 'admin') {
            $stats['jenis'] = JenisKomponen::count();
            $stats['users'] = User::where('role', 'user')->count();
        }

        // Ambil 5 komponen terbaru
        $recentKomponen = Komponen::latest()->take(5)->get();

        return view('dashboard', [
            'stats' => $stats,
            'recentKomponen' => $recentKomponen
        ]);
    }
}