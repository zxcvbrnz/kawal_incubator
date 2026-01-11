<div class="bg-amber-50 py-20" x-data="{
    canScrollLeft: false,
    canScrollRight: true,

    updateButtons() {
        const el = this.$refs.carousel;
        if (!el) return;
        this.canScrollLeft = el.scrollLeft > 10;
        this.canScrollRight = el.scrollLeft + el.clientWidth < el.scrollWidth - 10;
    },

    scroll(direction) {
        const el = this.$refs.carousel;
        const cardWidth = el.firstElementChild.offsetWidth + 24;
        el.scrollBy({
            left: direction === 'next' ? cardWidth : -cardWidth,
            behavior: 'smooth'
        });
    }
}" x-init="setTimeout(() => updateButtons(), 150)">

    <div class="max-w-7xl mx-auto px-6">

        <div class="mb-10">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-900">
                    Catatan Inovasi & Kreativitas
                </h2>
                @if ($posts->isNotEmpty())
                    <a href="{{ route('new') }}" wire:navigate
                        class="inline-flex items-center gap-2 text-sm font-bold text-amber-600 hover:text-amber-700 transition">
                        View More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                @endif
            </div>
            <p class="mt-4 text-gray-500">Simak kabar terbaru, cerita inspiratif dari para kreator, dan perkembangan
                ekosistem Kawal Incubator</p>
        </div>

        <div class="relative">
            <div x-ref="carousel" @scroll.debounce.50ms="updateButtons()"
                class="flex gap-6 overflow-x-auto scroll-smooth no-scrollbar snap-x snap-mandatory pb-4">
                @forelse($posts as $post)
                    <a href="{{ route('new.show', ['slug' => $post->slug]) }}" wire:navigate
                        class="group snap-start flex-none w-[calc(100%-40px)] sm:w-[calc(50%-12px)] lg:w-[calc(25%-18px)] group relative aspect-[3/4] rounded-2xl overflow-hidden shadow-lg transition-all duration-500 hover:shadow-2xl">
                        <img src="{{ asset('storage/new/' . $post->image_url) }}" alt="{{ $post->title }}"
                            class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent group-hover:from-amber-900/80 transition-colors duration-500">
                        </div>
                        <div class="absolute bottom-0 p-6 w-full">
                            <span class="text-amber-400 text-xs uppercase tracking-widest">
                                {{ $post->created_at->format('d M Y') }}
                            </span>
                            <h3
                                class="mt-3 text-white font-bold leading-snug line-clamp-3 group-hover:text-amber-200 transition">
                                {{ $post->title }}
                            </h3>
                            <div
                                class="mt-4 flex items-center gap-2 text-amber-400 text-sm opacity-0 -translate-x-4 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-500">
                                Baca Artikel
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </div>
                        </div>
                    </a>
                @empty
                    {{-- Empty State dalam Gaya Berita --}}
                    <div
                        class="w-full py-16 flex flex-col items-center justify-center bg-white/40 border-2 border-dashed border-amber-200 rounded-[2.5rem]">
                        <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-4">
                            <svg class="w-8 h-8 text-amber-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                        <h4 class="text-gray-900 font-bold uppercase tracking-widest text-xs">Belum Ada Catatan</h4>
                        <p class="text-gray-500 text-[10px] uppercase tracking-[0.2em] mt-2">Kisah inspiratif kami
                            sedang dalam proses penulisan.</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Navigasi Tombol hanya muncul jika ada data --}}
        @if ($posts->isNotEmpty())
            <div class="mt-6 flex items-center justify-center gap-6">
                <button @click="scroll('prev')" :disabled="!canScrollLeft"
                    class="px-4 py-2 rounded-full border-2 border-amber-500 text-amber-500 disabled:opacity-30 disabled:border-gray-300 disabled:text-gray-300 hover:bg-amber-500 hover:text-white transition-all duration-300 shadow-sm active:scale-90">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <button @click="scroll('next')" :disabled="!canScrollRight"
                    class="px-4 py-2 rounded-full border-2 border-amber-500 text-amber-500 disabled:opacity-30 disabled:border-gray-300 disabled:text-gray-300 hover:bg-amber-500 hover:text-white transition-all duration-300 shadow-sm active:scale-90">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        @endif
    </div>
</div>
