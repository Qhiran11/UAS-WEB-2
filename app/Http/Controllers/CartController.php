<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Komponen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Menambahkan item ke keranjang atau mengupdate jumlahnya.
     */
    public function add(Request $request)
    {
        // Validasi request, pastikan komponen_id ada dan valid
        $request->validate([
            'komponen_id' => 'required|exists:komponen,id',
        ]);

        $komponen = Komponen::findOrFail($request->komponen_id);
        $user = Auth::user();

        // Cek apakah stok tersedia
        if ($komponen->stok_komponen <= 0) {
            return back()->with('error', 'Maaf, stok produk ini telah habis.');
        }

        // Cek apakah item sudah ada di keranjang user
        $cartItem = Cart::where('user_id', $user->id)
                        ->where('komponen_id', $komponen->id)
                        ->first();

        if ($cartItem) {
            // Jika sudah ada, tambahkan quantity-nya
            $cartItem->quantity++;
            $cartItem->save();
        } else {
            // Jika belum ada, buat entri baru di keranjang
            Cart::create([
                'user_id' => $user->id,
                'komponen_id' => $komponen->id,
                'quantity' => 1,
            ]);
        }

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }
}