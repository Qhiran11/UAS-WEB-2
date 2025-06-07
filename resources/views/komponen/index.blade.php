<x-template_default title="Produk" section-title="Produk">
    @if (session('success'))
        <div class="bg-green-50 border border-green-500 text-green-500 px-3 py-2">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex mb-4">
        <a href="{{ route('komponen.create') }}"
           class="bg-green-50 text-green-500 border border-green-500 px-3 py-2 flex items-center gap-2">
            <i class="ph ph-plus block text-green-500"></i>
            <div>Tambah Komponen</div>
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow">
            <thead>
                <tr class="border-b border-zinc-200 text-sm leading-normal">
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">Nama Komponen</th>
                    <th class="py-3 px-6 text-center">Jenis</th>
                    <th class="py-3 px-6 text-center">Harga</th>
                    <th class="py-3 px-6 text-center">Stok</th>
                    <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-zinc-700 text-sm font-light">
                @forelse ($Komponens as $komponen)
                <tr class="border-b border-zinc-200 hover:bg-zinc-100">
                    <td class="py-3 px-6 text-left">{{ $loop->iteration }}</td>
                    <td class="py-3 px-6 text-left">{{ $komponen->nama_komponen }}</td>
                    <td class="py-3 px-6 text-center">{{ $komponen->jenisKomponen->nama_jenis ?? 'Tidak diketahui' }}</td>

                    <td class="py-3 px-6 text-center">Rp{{ number_format($komponen->harga_komponen, 0, ',', '.') }}</td>
                    <td class="py-3 px-6 text-center">{{ $komponen->stok_komponen }}</td>
                    <td class="py-3 px-6 flex justify-center gap-1">
                        <a href="{{ route('komponen.show', $komponen->id) }}" 
                            class="bg-blue-50 border border-blue-500 p-2 inline-block">
                            <i class="ph ph-eye block text-blue-500"></i>
                        </a>
                        <a href="{{ route('komponen.edit', $komponen->id) }}" 
                            class="bg-yellow-50 border border-yellow-500 p-2 inline-block">
                            <i class="ph ph-note-pencil block text-yellow-500"></i>
                        </a>
                        <form onsubmit="return confirm('Yakin ingin menghapus?')" 
                              action="{{ route('komponen.destroy', $komponen->id) }}" 
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-50 border border-red-500 p-2">
                                <i class="ph ph-trash-simple block text-red-500"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-zinc-500">Tidak ada data komponen.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-template_default>
