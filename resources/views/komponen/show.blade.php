<x-template_default :title="$komponen->nama_komponen" :section-title="$komponen->nama_komponen">

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            {{-- Kolom Gambar --}}
            <div>
                <img class="w-full h-auto rounded-lg shadow-md object-cover" 
                     src="{{ $komponen->gambar ? asset('storage/komponen/' . $komponen->gambar) : 'https://via.placeholder.com/600' }}" 
                     alt="{{ $komponen->nama_komponen }}">
            </div>

            {{-- Kolom Informasi & Aksi --}}
            <div>
                <div class="border-b pb-4 mb-4">
                    <p class="text-sm text-zinc-500 mb-1">{{ $komponen->jenisKomponen->nama_jenis ?? 'Uncategorized' }}</p>
                    <h1 class="text-3xl font-bold text-zinc-800">{{ $komponen->nama_komponen }}</h1>
                </div>

                <div class="mb-5">
                    <p class="text-4xl font-extrabold text-blue-600">
                        Rp{{ number_format($komponen->harga_komponen, 0, ',', '.') }}
                    </p>
                </div>
                
                <div class="mb-5">
                    <h3 class="text-md font-semibold text-zinc-700 mb-2">Deskripsi Produk</h3>
                    <p class="text-zinc-600 text-sm leading-relaxed">
                        {{-- Saat ini kita belum punya deskripsi di database, jadi kita gunakan teks placeholder. --}}
                        Ini adalah deskripsi placeholder untuk {{ $komponen->nama_komponen }}. Detail lebih lanjut tentang spesifikasi, kegunaan, dan fitur-fitur unggulan dari produk ini akan ditampilkan di sini.
                    </p>
                </div>

                <div class="bg-zinc-100 p-3 rounded-md mb-6">
                    <span class="text-sm font-semibold text-zinc-700">Stok Tersedia: {{ $komponen->stok_komponen }} buah</span>
                </div>

                {{-- Tombol Aksi --}}
                @if(Auth::user()->role === 'user')
                    {{-- Tampilkan tombol belanja HANYA untuk USER --}}
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button class="w-full bg-blue-100 text-blue-800 font-bold py-3 rounded-md hover:bg-blue-200 transition flex items-center justify-center gap-2">
                            <i class="ph ph-shopping-cart-simple text-xl"></i>
                            <span>Tambah ke Keranjang</span>
                        </button>
                        <button class="w-full bg-blue-600 text-white font-bold py-3 rounded-md hover:bg-blue-700 transition">
                            Beli Sekarang
                        </button>
                    </div>
                @else
                    {{-- Tampilkan tombol manajemen HANYA untuk ADMIN --}}
                    <div class="flex gap-3">
                        <a href="{{ route('admin.komponen.edit', $komponen->id) }}" class="w-full text-center bg-yellow-500 text-white font-bold py-3 rounded-md hover:bg-yellow-600 transition flex items-center justify-center gap-2">
                            <i class="ph-fill ph-note-pencil text-xl"></i>
                            <span>Edit Produk</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>

        {{-- Tombol Kembali --}}
        <div class="mt-8 border-t pt-6">
            <a href="{{ route('komponen.index') }}" class="text-blue-600 hover:underline">
                &larr; Kembali ke Daftar Produk
            </a>
        </div>
    </div>

</x-template_default>