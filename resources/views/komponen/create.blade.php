<x-template_default title="Komponen" section-title="Add New Komponen">
    <h2 class="dashboard_title">CREATE KOMPONEN</h2>

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

        <form action="{{ route('admin.komponen.store') }}" method="POST"
            enctype="multipart/form-data"
            style="display: flex; flex-direction: column; gap: 20px; padding: 30px; border: 1px solid #ccc; background: #fff; width: 100%; max-width: 600px;">
            @csrf

            {{-- Name --}}
            <label>
                <strong>Name</strong>
                <input type="text" name="nama_komponen" value="{{ old('nama_komponen') }}"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc;">
                @error('nama_komponen') <div style="color: red;">{{ $message }}</div> @enderror
            </label>
            
            {{-- Gambar --}}
            <label>
                <strong>Gambar Produk</strong>
                <input type="file" name="gambar" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                @error('gambar') <div style="color: red;">{{ $message }}</div> @enderror
            </label>

            {{-- Stock --}}
            <label>
                <strong>Stock</strong>
                <input type="number" name="stok_komponen" value="{{ old('stok_komponen') }}"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc;">
                @error('stok_komponen') <div style="color: red;">{{ $message }}</div> @enderror
            </label>

            {{-- Price --}}
            <label>
                <strong>Price (IDR)</strong>
                <input type="number" name="harga_komponen" value="{{ old('harga_komponen') }}"
                    style="width: 100%; padding: 10px; border: 1px solid #ccc;">
                @error('harga_komponen') <div style="color: red;">{{ $message }}</div> @enderror
            </label>

            {{-- Type --}}
            <label>
                <strong>Jenis Komponen</strong>
                <select name="jenis_komponen_id" style="width: 100%; padding: 10px; border: 1px solid #ccc;">
                    <option value="" disabled selected>Select Type</option>
                    @foreach ($jenis_komponen ?? [] as $jenis)
                        @if ($jenis)
                            <option value="{{ $jenis->id }}" {{ old('jenis_komponen_id') == $jenis->id ? 'selected' : '' }}>
                                {{ $jenis->nama_jenis }}
                            </option>
                        @endif
                    @endforeach
                </select>
                @error('jenis_komponen_id') <div style="color: red;">{{ $message }}</div> @enderror
            </label>

            {{-- Actions --}}
            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <a href="{{ route('komponen.index') }}"
                    style="padding: 10px 20px; border: 1px solid #ccc; background: #eee; color: #333; text-decoration: none;">
                    Cancel
                </a>
                <button type="submit"
                    style="padding: 10px 20px; border: 1px solid #28a745; background: #eaffea; color: #28a745;">
                    Create
                </button>
            </div>
        </form>
    </div>
</x-template_default>