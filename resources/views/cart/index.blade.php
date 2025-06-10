<x-template_default title="Keranjang Belanja" section-title="Keranjang Belanja Anda">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        @if($cartItems->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-zinc-100">
                        <tr>
                            <th class="py-3 px-4 text-left">Produk</th>
                            <th class="py-3 px-4 text-left">Harga</th>
                            <th class="py-3 px-4 text-center">Kuantitas</th>
                            <th class="py-3 px-4 text-left">Subtotal</th>
                            <th class="py-3 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                        <tr class="border-b">
                            <td class="py-4 px-4 flex items-center gap-4">
                                <img src="{{ asset('uploads/komponen/' . $item->komponen->gambar) }}" class="h-16 w-16 object-cover rounded-md">
                                <div>
                                    <p class="font-semibold">{{ $item->komponen->nama_komponen }}</p>
                                    <p class="text-sm text-zinc-500">Stok: {{ $item->komponen->stok_komponen }}</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">Rp{{ number_format($item->komponen->harga_komponen) }}</td>
                            <td class="py-4 px-4">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex justify-center items-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" class="w-16 text-center border rounded py-1" min="1">
                                    <button type="submit" class="text-blue-500 hover:text-blue-700"><i class="ph-fill ph-check-circle text-xl"></i></button>
                                </form>
                            </td>
                            <td class="py-4 px-4 font-semibold">Rp{{ number_format($item->quantity * $item->komponen->harga_komponen) }}</td>
                            <td class="py-4 px-4 text-center">
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" title="Hapus Item">
                                        <i class="ph-fill ph-trash-simple text-2xl"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Total dan Tombol Checkout --}}
            <div class="mt-6 flex flex-col md:flex-row justify-between items-center">
                <div class="text-center md:text-left">
                    <h3 class="text-xl font-bold">Total: <span class="text-blue-600">Rp{{ number_format($total) }}</span></h3>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="#" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-md hover:bg-blue-700 transition">
                        Lanjut ke Checkout
                    </a>
                </div>
            </div>

        @else
            <div class="text-center py-10">
                <i class="ph-fill ph-shopping-cart text-6xl text-zinc-300 mx-auto"></i>
                <h2 class="text-2xl font-semibold mt-4">Keranjang Anda Kosong</h2>
                <p class="text-zinc-500 mt-2">Sepertinya Anda belum menambahkan produk apapun.</p>
                <a href="{{ route('komponen.index') }}" class="mt-6 inline-block bg-blue-600 text-white font-bold py-2 px-6 rounded-md hover:bg-blue-700 transition">
                    Mulai Belanja Sekarang
                </a>
            </div>
        @endif
    </div>
</x-template_default>