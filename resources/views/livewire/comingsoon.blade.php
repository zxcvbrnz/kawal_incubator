<div class="min-h-[80vh] flex items-center justify-center px-6">
    <div class="max-w-2xl text-center">
        {{-- Ikon Animasi Sederhana --}}
        <div class="mb-10 flex justify-center">
            <div class="relative">
                <div class="absolute inset-0 bg-amber-200 rounded-[3rem] blur-2xl opacity-30 animate-pulse"></div>
                <div
                    class="relative p-8 bg-white rounded-[3rem] border border-amber-100 shadow-sm transition-transform hover:scale-110 duration-500">
                    <svg class="w-24 h-24 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Teks Konten --}}
        <h1 class="text-4xl md:text-6xl font-black text-gray-900 uppercase tracking-tighter mb-6">
            {{ __('Toko Segera Hadir') }}
        </h1>
        <p class="text-gray-500 text-lg mb-12 leading-relaxed max-w-lg mx-auto">
            {{ __('Kami sedang merakit galeri produk terbaik dari para partisipan. Marketplace ini akan menjadi wadah bagi karya kreatif yang sudah terkurasi.') }}
        </p>

        {{-- Tombol Navigasi --}}
        <div class="flex flex-col sm:flex-row items-center justify-center gap-5">
            <div
                class="px-8 py-5 bg-amber-50 text-amber-600 rounded-[2rem] border border-amber-100 font-black text-[10px] uppercase tracking-[0.3em]">
                🚀 Launching Soon
            </div>
        </div>
    </div>
</div>
