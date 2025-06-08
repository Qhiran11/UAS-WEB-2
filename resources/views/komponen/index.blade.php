<x-template_default title="Produk" section-title="Produk">
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tampilkan tombol ini HANYA untuk ADMIN --}}
    @if(Auth::user()->role === 'admin')
    <div class="flex mb-4">
        <a href="{{ route('admin.komponen.create') }}"
           class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded flex items-center gap-2 transition duration-300">
            <i class="ph ph-plus"></i>
            <span>Tambah Komponen</span>
        </a>
    </div>
    @endif

    {{-- Grid View untuk Produk --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($Komponens as $komponen)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col group">
            <div class="relative">
                <img class="w-full h-48 object-cover" 
                     src="{{ $komponen->gambar ? asset('storage/komponen/' . $komponen->gambar) : 'https://via.placeholder.com/300' }}" 
                     alt="{{ $komponen->nama_komponen }}">
                {{-- Tombol Edit & Hapus untuk Admin --}}
                @if(Auth::user()->role === 'admin')
                <div class="absolute top-2 right-2 flex gap-2">
                    <a href="{{ route('komponen.edit', $komponen->id) }}" class="bg-yellow-400 p-2 rounded-full shadow-lg hover:bg-yellow-500 transition-all">
                        <i class="ph-fill ph-note-pencil text-white"></i>
                    </a>
                    <form onsubmit="return confirm('Yakin ingin menghapus?')" 
                          action="{{ route('komponen.destroy', $komponen->id) }}" 
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 p-2 rounded-full shadow-lg hover:bg-red-600 transition-all">
                            <i class="ph-fill ph-trash-simple text-white"></i>
                        </button>
                    </form>
                </div>
                @endif
            </div>
            
            <div class="p-4 flex flex-col flex-grow">
                <h3 class="font-bold text-lg mb-1 text-zinc-800">{{ $komponen->nama_komponen }}</h3>
                <p class="text-sm text-zinc-500 mb-3">{{ $komponen->jenisKomponen->nama_jenis ?? 'Uncategorized' }}</p>
                <p class="font-bold text-blue-600 text-xl mb-3">Rp{{ number_format($komponen->harga_komponen, 0, ',', '.') }}</p>
                <p class="text-xs text-zinc-600 mb-4">Stok: {{ $komponen->stok_komponen }}</p>

                {{-- Tombol Detail dan Keranjang --}}
                <div class="mt-auto flex gap-2">
                    <a href="{{ route('komponen.show', $komponen->id) }}" class="flex-1 text-center bg-zinc-200 text-zinc-800 font-semibold py-2 rounded-md hover:bg-zinc-300 transition">
                        Detail
                    </a>
                    {{-- Tombol Keranjang HANYA untuk USER --}}
                    @if(Auth::user()->role === 'user')
                    <button class="flex-1 bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 transition flex items-center justify-center gap-1">
                        <i class="ph ph-shopping-cart"></i>
                        <span>Keranjang</span>
                    </button>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-10 text-zinc-500">
            <p>Tidak ada data komponen.</p>
        </div>
        @endforelse
    </div>

</x-template_default>