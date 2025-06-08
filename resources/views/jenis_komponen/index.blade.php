<x-template_default title="Jenis Komponen" section-title="Jenis Komponen">
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="flex mb-4">
        <a href="{{ route('admin.jenis_komponen.create') }}"
           class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded flex items-center gap-2 transition duration-300">
            <i class="ph ph-plus"></i>
            <span>Tambah Jenis</span>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        @forelse ($jenisKomponens as $jenis)
        <div class="bg-white rounded-lg shadow-md p-4 flex flex-col justify-between">
            <h3 class="font-bold text-lg text-zinc-800 mb-4">{{ $jenis->nama_jenis }}</h3>
            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.jenis_komponen.edit', $jenis->id) }}" class="text-yellow-500 hover:text-yellow-700 p-1">
                    <i class="ph-fill ph-note-pencil text-xl"></i>
                </a>
                <form onsubmit="return confirm('Yakin ingin menghapus?')" 
                      action="{{ route('admin.jenis_komponen.destroy', $jenis->id) }}" 
                      method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700 p-1">
                        <i class="ph-fill ph-trash-simple text-xl"></i>
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-10 text-zinc-500">
            <p>Tidak ada data jenis komponen.</p>
        </div>
        @endforelse
    </div>

</x-template_default>