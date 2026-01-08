<x-main-layout>
    <x-slot name="title">Berita Tidak Ditemukan</x-slot>

    <div class="min-h-[80vh] flex items-center justify-center px-4 py-20">
        <div class="max-w-2xl w-full text-center">
            <div class="relative inline-block mb-8">
                <span class="text-[10rem] font-black text-gray-100 leading-none">404</span>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="bg-amber-500 p-4 rounded-2xl shadow-xl rotate-3">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2zM7 8h5m-5 4h5m-5 4h5">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            <h2 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Kabar Ini Belum Ditulis</h2>
            <p class="text-gray-400 font-medium max-w-md mx-auto mt-4">
                Maaf, berita yang kamu cari tidak ditemukan atau mungkin sudah dihapus oleh admin.
            </p>

            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('news') }}"
                    class="px-8 py-4 bg-amber-500 text-white rounded-3xl font-black uppercase text-xs tracking-widest shadow-xl shadow-amber-200 hover:bg-amber-600 transition-all">
                    Lihat Berita Lainnya
                </a>
            </div>
        </div>
    </div>
</x-main-layout>
