<div class="min-h-screen bg-white pb-4">
    <header class=" pb-12 border-b border-gray-50">
        <div class="max-w-7xl mx-auto px-6 flex justify-end gap-6">
            {{-- <div class="space-y-2">
                <div class="flex items-center gap-2">
                    <span class="h-1 w-8 bg-amber-500 rounded-full"></span>
                    <span class="text-xs font-bold tracking-[0.3em] text-amber-600 uppercase">Learning Resources</span>
                </div>
                <h1 class="text-4xl font-light text-gray-900 tracking-tight">
                    Video <span class="font-bold">Pembelajaran</span>
                </h1>
                <p class="text-gray-500 text-sm max-w-md leading-relaxed">
                    Eksplorasi modul tutorial eksklusif untuk meningkatkan keahlian teknis Anda secara mandiri.
                </p>
            </div> --}}

            <div class="relative w-full md:w-80">
                <input wire:model.live="search" type="text" placeholder="Cari materi..."
                    class="w-full pl-12 pr-6 py-3 bg-white border border-gray-100 rounded-2xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all font-bold text-sm shadow-sm">
                <div class="absolute left-4 top-3.5 text-gray-300 group-focus-within:text-amber-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-6 mt-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($videos as $video)
                <a href="{{ route('video.show', $video->id) }}" class="group block space-y-4">
                    <div
                        class="aspect-video relative rounded-2xl overflow-hidden bg-gray-100 shadow-sm transition-all duration-500 group-hover:shadow-2xl group-hover:shadow-amber-500/10 group-hover:-translate-y-1">
                        @if ($video->type == 'youtube')
                            <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/mqdefault.jpg"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-amber-50">
                                <svg class="w-12 h-12 text-amber-200" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                </svg>
                            </div>
                        @endif

                        <div
                            class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity bg-black/10">
                            <div
                                class="w-12 h-12 bg-white rounded-full shadow-xl flex items-center justify-center transform scale-75 group-hover:scale-100 transition-transform">
                                <svg class="w-5 h-5 text-amber-600 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 22v-20l18 10-18 10z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="px-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span
                                class="text-[10px] font-black uppercase tracking-widest text-amber-600 bg-amber-50 px-2 py-0.5 rounded">{{ $video->type }}</span>
                            <span
                                class="text-[10px] text-gray-400 font-medium uppercase tracking-tighter">{{ $video->created_at->diffForHumans() }}</span>
                        </div>
                        <h3
                            class="text-lg font-semibold text-gray-900 leading-snug group-hover:text-amber-600 transition-colors line-clamp-2">
                            {{ $video->judul }}
                        </h3>
                    </div>
                </a>
            @empty
                <div class="col-span-full py-20 flex flex-col items-center justify-center text-center">

                    @if ($search)
                        <div class="bg-white p-10 rounded-[3rem] border border-dashed border-gray-200 w-full max-w-lg">
                            <div
                                class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Pencarian Tidak Ditemukan</h3>
                            <p class="text-gray-500 text-sm mb-8">
                                Tidak ada materi yang cocok dengan kata kunci <span
                                    class="font-bold text-amber-600">"{{ $search }}"</span>.
                                Coba gunakan kata kunci lain.
                            </p>
                        </div>
                    @else
                        <div class="relative mb-8">
                            <div class="absolute inset-0 bg-amber-400 opacity-20 blur-[60px] rounded-full"></div>
                            <div
                                class="relative flex items-center justify-center w-28 h-28 bg-gradient-to-br from-amber-50 to-white rounded-[2.5rem] border border-amber-100 shadow-sm">
                                <svg class="w-12 h-12 text-amber-500/80" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <div class="max-w-md px-6">
                            <h3 class="text-2xl font-black text-gray-900 uppercase tracking-tight mb-3">
                                Belum Ada <span class="text-amber-500">Materi Tersedia</span>
                            </h3>
                            <p class="text-gray-500 leading-relaxed text-sm mb-10 uppercase tracking-[0.1em]">
                                Kami sedang menyiapkan konten berkualitas tinggi untuk Anda. Silakan kembali lagi nanti.
                            </p>

                            <a href="/" wire:navigate
                                class="inline-flex items-center gap-3 px-10 py-4 bg-gray-900 text-white rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] transition-all hover:bg-amber-600 shadow-sm active:scale-95">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7 7-7"></path>
                                </svg>
                                Kembali ke Beranda
                            </a>
                        </div>
                    @endif

                </div>
            @endforelse
        </div>

        @if ($videos->isNotEmpty())
            <div class="mt-20 flex justify-center border-t border-gray-50 pt-10">
                {{ $videos->links('vendor.pagination.custom-amber') }}
            </div>
        @endif
    </div>
</div>
