<x-main-layout>
    <x-slot name="title">Event Tidak Ditemukan</x-slot>

    <div class="min-h-[80vh] flex items-center justify-center px-4 py-20">
        <div class="max-w-2xl w-full text-center">
            {{-- Ikon & Angka 404 --}}
            <div class="relative inline-block mb-8">
                <span class="text-[10rem] font-black text-gray-100 leading-none">404</span>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="bg-amber-500 p-5 rounded-3xl shadow-xl -rotate-6 border-4 border-white">
                        {{-- Ikon Kalender/Event --}}
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Pesan Teks --}}
            <h2 class="text-3xl md:text-4xl font-black text-gray-900 uppercase tracking-tight">
                Agenda Tidak Ditemukan
            </h2>
            <p class="text-gray-400 font-medium max-w-md mx-auto mt-4">
                Maaf, event yang kamu cari tidak ada di data kami, mungkin sudah tidak ada atau sudah dihapus.
            </p>

            {{-- Navigasi --}}
            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('event') }}"
                    class="px-10 py-4 bg-amber-500 text-white rounded-3xl font-black uppercase text-xs tracking-widest shadow-xl shadow-amber-200 hover:bg-amber-600 active:scale-95 transition-all">
                    Cari Event Lain
                </a>

                <a href="/"
                    class="px-10 py-4 bg-white border-2 border-gray-100 text-gray-400 rounded-3xl font-black uppercase text-xs tracking-widest hover:border-amber-500 hover:text-amber-500 transition-all">
                    Ke Beranda
                </a>
            </div>
        </div>
    </div>
</x-main-layout>
