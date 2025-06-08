<x-template_default title="Edit Jenis" section-title="Edit Jenis Komponen">
     <div class="flex justify-center">
        <div class="w-full max-w-lg p-6 bg-white border border-zinc-200 shadow-md rounded-lg">
            <form action="{{ route('admin.jenis_komponen.update', $jenis_komponen->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-2 mb-4">
                    <label for="nama_jenis" class="font-semibold text-sm text-zinc-700">Nama Jenis</label>
                    <input type="text" id="nama_jenis" name="nama_jenis"
                        class="px-3 py-2 border border-zinc-300 rounded-md @error('nama_jenis') border-red-500 @enderror"
                        value="{{ old('nama_jenis', $jenis_komponen->nama_jenis) }}" required>
                    @error('nama_jenis')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end gap-2">
                    <a href="{{ route('admin.jenis_komponen.index') }}" class="bg-zinc-200 text-zinc-800 font-semibold px-4 py-2 rounded-md hover:bg-zinc-300">Batal</a>
                    <button type="submit" class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-md hover:bg-blue-700">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-template_default>