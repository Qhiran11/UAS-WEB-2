<x-template_default title="Tentang Q-Store" section-title="Tentang Q-Store">
    <div class="bg-white p-8 rounded-lg shadow-lg">

        {{-- Bagian Header --}}
        <div class="text-center border-b pb-6 mb-6">
            <img src="{{ asset('images/Logo.png') }}" alt="Q-Store Logo" class="mx-auto mb-4 w-24 h-24">
            <h1 class="text-4xl font-bold text-zinc-800">Selamat Datang di Q-Store</h1>
            <p class="text-lg text-zinc-600 mt-2">Pusat Komponen Elektronik Terlengkap dan Terpercaya</p>
        </div>

        {{-- Bagian Misi & Visi --}}
        <div class="grid md:grid-cols-2 gap-8 mb-8">
            <div>
                <h2 class="text-2xl font-semibold text-blue-700 mb-3 flex items-center gap-2">
                    <i class="ph-fill ph-rocket-launch"></i>
                    Misi Kami
                </h2>
                <p class="text-zinc-700 leading-relaxed">
                    Menyediakan akses mudah dan cepat terhadap komponen elektronik berkualitas tinggi bagi para pelajar, penghobi, teknisi, dan profesional di seluruh Indonesia untuk mendukung inovasi dan kreativitas di dunia teknologi.
                </p>
            </div>
            <div>
                <h2 class="text-2xl font-semibold text-blue-700 mb-3 flex items-center gap-2">
                    <i class="ph-fill ph-binoculars"></i>
                    Visi Kami
                </h2>
                <p class="text-zinc-700 leading-relaxed">
                    Menjadi platform e-commerce komponen elektronik nomor satu yang mengedepankan kelengkapan produk, keaslian barang, harga yang kompetitif, serta pengalaman belanja yang edukatif dan memuaskan.
                </p>
            </div>
        </div>

        {{-- Bagian Kenapa Memilih Kami --}}
        <div>
            <h2 class="text-2xl font-bold text-zinc-800 text-center mb-6">Mengapa Memilih Q-Store?</h2>
            <div class="grid sm:grid-cols-1 md:grid-cols-3 gap-6 text-center">
                <div class="bg-zinc-50 p-6 rounded-lg">
                    <i class="ph-fill ph-check-circle text-4xl text-green-500 mx-auto mb-3"></i>
                    <h3 class="font-semibold text-lg mb-1">Produk Terjamin</h3>
                    <p class="text-sm text-zinc-600">Kami hanya menjual produk asli dari distributor terpercaya untuk memastikan kualitas terbaik untuk proyek Anda.</p>
                </div>
                <div class="bg-zinc-50 p-6 rounded-lg">
                    <i class="ph-fill ph-package text-4xl text-blue-500 mx-auto mb-3"></i>
                    <h3 class="font-semibold text-lg mb-1">Lengkap & Update</h3>
                    <p class="text-sm text-zinc-600">Dari resistor hingga mikrokontroler terbaru, kami terus memperbarui stok untuk memenuhi kebutuhan Anda.</p>
                </div>
                <div class="bg-zinc-50 p-6 rounded-lg">
                    <i class="ph-fill ph-chats text-4xl text-purple-500 mx-auto mb-3"></i>
                    <h3 class="font-semibold text-lg mb-1">Dukungan Pelanggan</h3>
                    <p class="text-sm text-zinc-600">Tim kami siap membantu Anda menemukan komponen yang tepat dan menjawab setiap pertanyaan teknis Anda.</p>
                </div>
            </div>
        </div>

    </div>
</x-template_default>