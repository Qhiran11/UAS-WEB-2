<x-template_default title="Jenis Komponen" section-title="Jenis Komponen">
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow">
            <thead>
                <tr class="border-b border-zinc-200 text-sm leading-normal">
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">Nama Jenis</th>
                    <th class="py-3 px-6 text-left">Created At</th>
                    <th class="py-3 px-6 text-left">Updated At</th>
                </tr>
            </thead>
            <tbody class="text-zinc-700 text-sm font-light">
                @forelse ($jenisKomponens as $jenis)
                <tr class="border-b border-zinc-200 hover:bg-zinc-100">
                    <td class="py-3 px-6 text-left">{{ $loop->iteration }}</td>
                    <td class="py-3 px-6 text-left">{{ $jenis->nama_jenis }}</td>
                    <td class="py-3 px-6 text-left">{{ $jenis->created_at }}</td>
                    <td class="py-3 px-6 text-left">{{ $jenis->updated_at }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-zinc-500">Tidak ada data jenis komponen.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-template_default>
