<x-template_default title="Dashboard" section-title="Dashboard">
    
    <h2 class="dashboard_title">WELCOME, {{ Auth::user()->name }}</h2>

    <div class="dashboard-sections">

        {{-- Kartu untuk Semua User --}}
        <div class="dashboard-card">
            <a href="{{ route('komponen.index') }}" style="text-decoration: none; color: inherit;">
                <h3>Product</h3>
                <img src="{{ asset('images/komponen.png') }}" alt="Komponen" width="150">
            </a>
        </div>

        {{-- Kartu Khusus Admin --}}
        @if(Auth::user()->role === 'admin')
            <div class="dashboard-card">
                {{-- Perbaiki rute di sini --}}
                <a href="{{ route('admin.jenis_komponen.index') }}" style="text-decoration: none; color: inherit;">
                    <h3>Kelola Jenis</h3>
                    <img src="{{ asset('images/jenis.png') }}" alt="Jenis" width="150">
                </a>
            </div>

            <div class="dashboard-card">
                <a href="{{ route('admin.users.index') }}" style="text-decoration: none; color: inherit;">
                    <h3>Kelola User</h3>
                    <img src="{{ asset('images/tentang.png') }}" alt="Kelola User" width="150">
                </a>
            </div>
        @endif
        
    </div>

</x-template_default>