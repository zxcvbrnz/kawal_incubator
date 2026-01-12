<div class="bg-white pb-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="relative bg-gray-900 rounded-[2rem] lg:rounded-[3rem] p-8 md:p-12 overflow-hidden shadow-2xl">

            {{-- Dekorasi Cahaya Latar --}}
            <div class="absolute top-0 right-0 w-64 h-64 bg-amber-500/10 rounded-full blur-3xl -mr-20 -mt-20"></div>

            <div class="relative z-10 flex flex-col items-center text-center">
                <h2 class="text-xl md:text-2xl font-bold text-white leading-tight">
                    Ingin Menjadi Bagian dari <span class="text-amber-500">Perubahan?</span>
                </h2>
                <p
                    class="mt-3 text-gray-400 text-[11px] md:text-xs max-w-md leading-relaxed uppercase tracking-widest font-medium">
                    Tingkatkan visibilitas brand Anda dan dukung pertumbuhan wirausaha lokal melalui kolaborasi
                    sponsorship.
                </p>

                <div class="mt-10">
                    <a href="{{ route('join_sponsor') }}"
                        class="group relative inline-flex items-center gap-4 px-12 py-5 bg-amber-500 text-gray-900 text-[11px] font-black uppercase tracking-[0.25em] rounded-2xl 
                               transition-all duration-500 ease-out overflow-hidden
                               hover:bg-amber-400 hover:-translate-y-2 hover:shadow-[0_25px_50px_-12px_rgba(245,158,11,0.6)]
                               active:scale-95">

                        {{-- 1. Efek Shimmer (Kilatan Cahaya yang bergerak otomatis) --}}
                        <div
                            class="absolute inset-0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/40 to-transparent">
                        </div>

                        {{-- 2. Efek Glow Statis yang menguat saat hover --}}
                        <div
                            class="absolute inset-0 rounded-2xl bg-amber-400 blur-xl opacity-0 group-hover:opacity-50 transition-opacity duration-500">
                        </div>

                        {{-- Teks --}}
                        <span class="relative z-10">Jadilah Sponsor Kami</span>

                        {{-- 3. Ikon Animasi --}}
                        <div
                            class="relative z-10 flex items-center justify-center w-6 h-6 bg-black/10 rounded-full group-hover:bg-black transition-colors duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-3.5 h-3.5 text-gray-900 group-hover:text-amber-500 transform group-hover:translate-x-1 transition-all duration-500 ease-in-out"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>

                        {{-- 4. Ring Animasi Luar (Pulse Effect) --}}
                        <div
                            class="absolute inset-0 rounded-2xl border-2 border-amber-500/0 group-hover:border-amber-500/100 group-hover:scale-110 transition-all duration-500">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
