<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Komponen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CartController extends Controller
{
    use AuthorizesRequests;
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

    // app/Http/Controllers/CartController.php

    // ... (method add yang sudah ada) ...

    /**
     * Menampilkan halaman keranjang belanja.
     */
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())
                        ->with('komponen') // Eager load data komponen
                        ->get();

        // Hitung total harga
        $total = $cartItems->sum(function($item) {
            return $item->quantity * $item->komponen->harga_komponen;
        });

        return view('cart.index', [
            'cartItems' => $cartItems,
            'total' => $total
        ]);
    }

    /**
     * Mengupdate kuantitas item di keranjang.
     */
    public function update(Request $request, Cart $cart)
    {
        // Pastikan user hanya bisa mengupdate keranjangnya sendiri
        $this->authorize('update', $cart);

        $request->validate(['quantity' => 'required|integer|min:1']);

        // Cek stok
        if ($request->quantity > $cart->komponen->stok_komponen) {
            return back()->with('error', 'Maaf, stok tidak mencukupi.');
        }

        $cart->update(['quantity' => $request->quantity]);

        return back()->with('success', 'Kuantitas berhasil diperbarui.');
    }

    /**
     * Menghapus item dari keranjang.
     */
    public function remove(Cart $cart)
    {
        // Pastikan user hanya bisa menghapus dari keranjangnya sendiri
        $this->authorize('delete', $cart);

        $cart->delete();

        return back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}