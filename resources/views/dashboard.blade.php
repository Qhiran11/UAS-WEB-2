<x-template_default title="Dashboard" section-title="Dashboard">
    
    <h2 class="dashboard_title">WELCOME</h2>

    <div class="dashboard-sections" style="display: flex; gap: 20px; margin-top: 30px;">

        {{-- Komponen --}}
        <div class="dashboard-card" style="text-align: center;">
            <a href="{{ route('komponen.index') }}" style="text-decoration: none; color: inherit;">
                <h3>Product</h3>
                <img src="{{ asset('images/komponen.png') }}" alt="Komponen" width="150">
            </a>
        </div>

        {{-- Jenis --}}
        <div class="dashboard-card" style="text-align: center;">
            <a href="{{ route('jenis_komponen.index') }}" style="text-decoration: none; color: inherit;">
                <h3>Jenis</h3>
                <img src="{{ asset('images/jenis.png') }}" alt="Jenis" width="150">
            </a>
        </div>

        {{-- Tentang --}}
        <div class="dashboard-card" style="text-align: center;">
            <h3>Tentang</h3>
            <img src="{{ asset('images/tentang.png') }}" alt="Tentang" width="150">
        </div>

    </div>

</x-template_default>
