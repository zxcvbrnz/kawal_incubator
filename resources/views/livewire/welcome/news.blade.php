<div class="bg-amber-50 py-20" x-data="{
    canScrollLeft: false,
    canScrollRight: true,

    updateButtons() {
        const el = this.$refs.carousel;
        this.canScrollLeft = el.scrollLeft > 10;
        this.canScrollRight = el.scrollLeft + el.clientWidth < el.scrollWidth - 10;
    },

    scroll(direction) {
        const el = this.$refs.carousel;
        // Mengambil lebar satu card untuk pergeseran yang presisi
        const cardWidth = el.firstElementChild.offsetWidth + 24; // width + gap
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
                <a href="{{ route('new') }}" wire:navigate
                    class="inline-flex items-center gap-2 text-sm font-bold text-amber-600 hover:text-amber-700 transition">
                    View More
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
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
                        <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
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
                                Read Article
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="w-full py-20 text-center">
                        <p class="text-gray-500 italic text-center w-full">No news found...</p>
                    </div>
                @endforelse
            </div>
        </div>

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
    </div>
</div>
