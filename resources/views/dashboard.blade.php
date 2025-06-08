<x-template_default title="Dashboard" section-title="Dashboard">

    {{-- Panel Selamat Datang Baru --}}
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white p-6 rounded-lg shadow-lg mb-8">
        <h2 class="text-2xl font-bold mb-2">Selamat Datang di Q-Store, {{ Auth::user()->name }}!</h2>
        
        @if(Auth::user()->role === 'admin')
            {{-- Pesan untuk Admin --}}
            <p class="text-blue-100 mb-4">Anda memiliki akses penuh untuk mengelola seluruh aspek toko. Manfaatkan kekuatan Anda untuk menjaga Q-Store tetap yang terbaik!</p>
            <a href="{{ route('admin.komponen.create') }}" class="bg-white text-blue-700 font-bold py-2 px-4 rounded-md hover:bg-blue-50 transition duration-300 inline-flex items-center gap-2">
                <i class="ph-fill ph-plus-circle"></i>
                <span>Tambah Produk Baru</span>
            </a>
        @else
            {{-- Pesan untuk User --}}
            <p class="text-blue-100 mb-4">Jelajahi ribuan komponen elektronik berkualitas untuk segala kebutuhan proyek Anda, dari hobi hingga profesional.</p>
            <a href="{{ route('komponen.index') }}" class="bg-white text-blue-700 font-bold py-2 px-4 rounded-md hover:bg-blue-50 transition duration-300 inline-flex items-center gap-2">
                <i class="ph-fill ph-shopping-bag-open"></i>
                <span>Mulai Belanja</span>
            </a>
        @endif
    </div>


    {{-- Stat Cards --}}
    <h3 class="text-xl font-bold text-white mb-4">Ringkasan Toko</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        {{-- Total Produk --}}
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center gap-4">
            <div class="bg-blue-100 p-3 rounded-full">
                <i class="ph-fill ph-stack text-3xl text-blue-600"></i>
            </div>
            <div>
                <p class="text-sm text-zinc-500">Total Produk</p>
                <p class="text-2xl font-bold text-zinc-800">{{ $stats['komponen'] }}</p>
            </div>
        </div>

        {{-- Tampilkan hanya untuk Admin --}}
        @if(Auth::user()->role === 'admin')
            {{-- Total Jenis --}}
            <div class="bg-white p-6 rounded-lg shadow-lg flex items-center gap-4">
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="ph-fill ph-tag text-3xl text-green-600"></i>
                </div>
                <div>
                    <p class="text-sm text-zinc-500">Total Jenis</p>
                    <p class="text-2xl font-bold text-zinc-800">{{ $stats['jenis'] }}</p>
                </div>
            </div>

            {{-- Total User --}}
            <div class="bg-white p-6 rounded-lg shadow-lg flex items-center gap-4">
                <div class="bg-yellow-100 p-3 rounded-full">
                    <i class="ph-fill ph-users text-3xl text-yellow-600"></i>
                </div>
                <div>
                    <p class="text-sm text-zinc-500">Jumlah Pengguna</p>
                    <p class="text-2xl font-bold text-zinc-800">{{ $stats['users'] }}</p>
                </div>
            </div>
        @endif
    </div>

    {{-- Produk Terbaru --}}
    <div>
        <h3 class="text-xl font-bold text-white mb-4">Produk Terbaru</h3>
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-zinc-50">
                        <tr>
                            <th class="py-3 px-6 text-left text-xs font-semibold text-zinc-600 uppercase tracking-wider">Gambar</th>
                            <th class="py-3 px-6 text-left text-xs font-semibold text-zinc-600 uppercase tracking-wider">Nama Produk</th>
                            <th class="py-3 px-6 text-left text-xs font-semibold text-zinc-600 uppercase tracking-wider">Jenis</th>
                            <th class="py-3 px-6 text-left text-xs font-semibold text-zinc-600 uppercase tracking-wider">Harga</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-200">
                        @forelse($recentKomponen as $komponen)
                        <tr>
                            <td class="py-3 px-6">
                                <img src="{{ asset('uploads/komponen/' . $komponen->gambar) }}" alt="{{$komponen->nama_komponen}}" class="h-10 w-10 object-cover rounded-md">
                            </td>
                            <td class="py-3 px-6 font-medium text-zinc-800">{{ $komponen->nama_komponen }}</td>
                            <td class="py-3 px-6 text-zinc-600">{{ $komponen->jenisKomponen->nama_jenis ?? '' }}</td>
                            <td class="py-3 px-6 text-zinc-600">Rp{{ number_format($komponen->harga_komponen, 0, ',', '.') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-zinc-500">Belum ada produk.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-template_default>