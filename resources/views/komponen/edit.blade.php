<x-template_default title="Komponen" section-title="Edit Komponen">
    <h2 class="dashboard_title">EDIT KOMPONEN</h2>

    <div class="dashboard-sections" style="display: flex; justify-content: center; margin-top: 30px;">

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('komponen.update', $komponen->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nama Komponen --}}
            <label>
                <strong>Name</strong>
                <input type="text" name="nama_komponen" value="{{ old('nama_komponen', $komponen->nama_komponen) }}"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc;">
                @error('nama_komponen') <div style="color: red;">{{ $message }}</div> @enderror
            </label>

            @if($komponen->gambar)
                <div class="mb-4">
                    <img src="{{ asset('storage/komponen/' . $komponen->gambar) }}" alt="{{ $komponen->nama_komponen }}" width="150">
                </div>
            @endif

            <label>
                <strong>Ganti Gambar Produk</strong>
                <input type="file" name="gambar" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                @error('gambar') <div style="color: red;">{{ $message }}</div> @enderror
            </label>

            {{-- Deskripsi --}}
            <label>
                <strong>Description</strong>
                <textarea name="description" style="width: 100%; padding: 10px; border: 1px solid #ccc;">{{ old('description', $komponen->description) }}</textarea>
                @error('description') <div style="color: red;">{{ $message }}</div> @enderror
            </label>

            {{-- Stok --}}
            <label>
                <strong>Stock</strong>
                <input type="number" name="stok_komponen" value="{{ old('stok_komponen', $komponen->stok_komponen) }}"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc;">
                @error('stok_komponen') <div style="color: red;">{{ $message }}</div> @enderror
            </label>

            {{-- Harga --}}
            <label>
                <strong>Price (IDR)</strong>
                <input type="number" name="harga_komponen" value="{{ old('harga_komponen', $komponen->harga_komponen) }}"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc;">
                @error('harga_komponen') <div style="color: red;">{{ $message }}</div> @enderror
            </label>

            {{-- Jenis Komponen --}}
            <label>
                <strong>Jenis Komponen</strong>
                <select name="jenis_komponen_id" style="width: 100%; padding: 10px; border: 1px solid #ccc;">
                    <option value="" disabled selected>Select Type</option>
                    @foreach ($jenis_komponen as $jenis)
                        <option value="{{ $jenis->id }}" {{ old('jenis_komponen_id', $komponen->jenis_komponen_id) == $jenis->id ? 'selected' : '' }}>
                            {{ $jenis->nama_jenis }}
                        </option>
                    @endforeach
                </select>
                @error('jenis_komponen_id') <div style="color: red;">{{ $message }}</div> @enderror
            </label>

            {{-- Status --}}
            <label>
                <strong>Status</strong>
                <select name="status" style="width: 100%; padding: 10px; border: 1px solid #ccc;">
                    <option value="Active" {{ old('status', $komponen->status) == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ old('status', $komponen->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status') <div style="color: red;">{{ $message }}</div> @enderror
            </label>

            {{-- Tombol Aksi --}}
            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <a href="{{ route('komponen.index') }}" style="padding: 10px 20px; border: 1px solid #ccc; background: #eee; color: #333; text-decoration: none;">
                    Cancel
                </a>
                <button type="submit" style="padding: 10px 20px; border: 1px solid #28a745; background: #eaffea; color: #28a745;">
                    Update
                </button>
            </div>
        </form>

    </div>
</x-template_default>
