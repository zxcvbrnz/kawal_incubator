<x-main-layout>
    <x-slot name="title">
        Halaman Tidak Ditemukan
    </x-slot>

    <div class="min-h-[80vh] flex items-center justify-center px-4 py-20">
        <div class="max-w-2xl w-full text-center">
            {{-- Animasi Angka 404 --}}
            <div class="relative inline-block">
                <h1 class="text-[12rem] md:text-[15rem] font-black text-gray-100 leading-none select-none">
                    404
                </h1>
                <div class="absolute inset-0 flex items-center justify-center">
                    <p
                        class="text-3xl md:text-4xl font-black text-amber-500 uppercase tracking-tighter bg-white px-6 py-2 rounded-2xl shadow-xl rotate-[-5deg] border-4 border-amber-500">
                        Ups! Nyasar
                    </p>
                </div>
            </div>

            {{-- Pesan Teks --}}
            <div class="mt-10 space-y-4">
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 uppercase tracking-tight">
                    Halaman Hilang di Telan Bumi
                </h2>
                <p class="text-gray-400 font-medium max-w-md mx-auto">
                    Mungkin link yang kamu klik sudah kadaluwarsa atau salah ketik. Tenang, kamu bisa kembali ke jalan
                    yang benar.
                </p>
            </div>

            {{-- Tombol Interaktif --}}
            <div class="mt-12 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ url()->previous() }}"
                    class="group w-full sm:w-auto px-8 py-4 bg-white border-2 border-gray-100 text-gray-400 rounded-3xl font-black uppercase text-xs tracking-widest hover:border-amber-500 hover:text-amber-500 transition-all flex items-center justify-center gap-2">
                    <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    Kembali
                </a>

                <a href="/"
                    class="group w-full sm:w-auto px-10 py-4 bg-amber-500 text-white rounded-3xl font-black uppercase text-xs tracking-widest shadow-xl shadow-amber-200 hover:bg-amber-600 active:scale-95 transition-all flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    Ke Beranda
                </a>
            </div>

            {{-- Dekorasi Tambahan --}}
            <div class="mt-20 flex justify-center gap-8 opacity-20">
                <div class="w-12 h-12 rounded-full bg-amber-200"></div>
                <div class="w-12 h-12 rounded-full bg-amber-400 animate-bounce"></div>
                <div class="w-12 h-12 rounded-full bg-amber-200"></div>
            </div>
        </div>
    </div>
</x-main-layout>
