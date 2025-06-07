<x-template_default title="Produk" section-title="Produk">
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex mb-4">
        <a href="{{ route('komponen.create') }}"
           class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded flex items-center gap-2 transition duration-300">
            <i class="ph ph-plus"></i>
            <span>Tambah Komponen</span>
        </a>
    </div>

    {{-- Grid View untuk Produk --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($Komponens as $komponen)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col">
            <a href="{{ route('komponen.show', $komponen->id) }}">
                <img class="w-full h-48 object-cover" 
                     src="{{ $komponen->gambar ? asset('storage/komponen/' . $komponen->gambar) : 'https://via.placeholder.com/300' }}" 
                     alt="{{ $komponen->nama_komponen }}">
            </a>
            <div class="p-4 flex flex-col flex-grow">
                <h3 class="font-bold text-lg mb-2 text-zinc-800">{{ $komponen->nama_komponen }}</h3>
                <p class="text-sm text-zinc-500 mb-2">{{ $komponen->jenisKomponen->nama_jenis ?? 'Uncategorized' }}</p>
                <div class="mt-auto">
                    <p class="font-semibold text-blue-600 text-xl mb-3">Rp{{ number_format($komponen->harga_komponen, 0, ',', '.') }}</p>
                    <div class="flex justify-between items-center text-sm text-zinc-600">
                        <span>Stok: {{ $komponen->stok_komponen }}</span>
                        {{-- Admin Action Buttons --}}
                        <div class="flex gap-2">
                             <a href="{{ route('komponen.edit', $komponen->id) }}" class="text-yellow-500 hover:text-yellow-700">
                                <i class="ph-fill ph-note-pencil text-xl"></i>
                            </a>
                            <form onsubmit="return confirm('Yakin ingin menghapus?')" 
                                  action="{{ route('komponen.destroy', $komponen->id) }}" 
                                  method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="ph-fill ph-trash-simple text-xl"></i>
                                </button>
                            </form>
                        </div>
                    </div>
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