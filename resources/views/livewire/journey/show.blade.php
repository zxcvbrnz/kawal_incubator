<div class="min-h-screen bg-white pb-24">
    <div class="pt-20 max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-16">
            <main class="lg:w-2/3">
                <article>
                    {{-- Slider Section --}}
                    <div x-data="{
                        active: 0,
                        total: {{ count($allImages) }},
                        scrollTo(index) {
                            if (index < 0) index = this.total - 1;
                            if (index >= this.total) index = 0;
                            this.active = index;
                            const container = this.$refs.slider;
                            container.scrollTo({
                                left: container.offsetWidth * index,
                                behavior: 'smooth'
                            });
                        }
                    }" class="relative mb-12 group">

                        <button @click="scrollTo(active - 1)"
                            class="absolute left-4 top-1/2 -translate-y-1/2 z-10 bg-white/80 backdrop-blur-md p-3 rounded-full shadow-lg text-gray-900 opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:bg-amber-500 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        <div x-ref="slider"
                            @scroll.debounce.100ms="active = Math.round($el.scrollLeft / $el.offsetWidth)"
                            class="flex overflow-x-auto snap-x snap-mandatory gap-0 no-scrollbar rounded-[2.5rem] shadow-lg border border-gray-100"
                            style="scroll-behavior: smooth;">

                            @foreach ($allImages as $img)
                                <div class="flex-none w-full snap-center aspect-video">
                                    <img src="{{ asset('storage/event/' . $img) }}"
                                        class="w-full h-full object-contain">
                                </div>
                            @endforeach
                        </div>

                        <button @click="scrollTo(active + 1)"
                            class="absolute right-4 top-1/2 -translate-y-1/2 z-10 bg-white/80 backdrop-blur-md p-3 rounded-full shadow-lg text-gray-900 opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:bg-amber-500 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <div class="flex justify-center gap-3 mt-6">
                            <template x-for="(n, index) in total" :key="index">
                                <button @click="scrollTo(index)"
                                    :class="active === index ? 'w-8 bg-amber-500' : 'w-2 bg-gray-200'"
                                    class="h-1.5 rounded-full transition-all duration-500"></button>
                            </template>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <div class="space-y-2">
                            <div class="flex items-center gap-3">
                                <span @class([
                                    'px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest',
                                    'bg-amber-100 text-amber-600' => $event->status == 0,
                                    'bg-gray-100 text-gray-500' => $event->status == 1,
                                ])>
                                    {{ $event->status == 0 ? 'Mendatang' : 'Selesai' }}
                                </span>
                                <span class="text-gray-400 font-bold text-[10px] uppercase tracking-[0.3em] italic">
                                    {{ $event->status == 0 ? 'Jadwal' : 'Arsip' }}:
                                    {{ $event->start_at->format('d M Y') }}
                                </span>
                            </div>

                            <h1 class="text-4xl lg:text-5xl font-black text-gray-900 leading-none uppercase">
                                {{ Str::beforeLast($event->name, ' ') }} <br>
                                <span class="text-amber-500 italic">{{ Str::afterLast($event->name, ' ') }}</span>
                            </h1>
                        </div>

                        <div class="prose prose-amber max-w-none">
                            <h2 class="text-xl font-bold text-gray-900 uppercase tracking-tight">
                                {{ $event->status == 0 ? 'Tentang Acara Ini' : 'Cerita Dibalik Acara' }}
                            </h2>
                            <div class="prose prose-amber prose-lg max-w-none text-gray-600 leading-relaxed whitespace-pre-wrap"
                                style="text-indent: 0;">{!! trim($event->description) !!}</div>
                        </div>
                    </div>
                </article>
            </main>

            <aside class="lg:w-1/3 space-y-12">
                <div class="bg-gray-50 p-8 rounded-[2.5rem] border border-gray-100 space-y-6">
                    <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Detail Informasi</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-4 text-xs font-bold text-gray-700 uppercase">
                            <i class="bi bi-geo-alt text-amber-500 text-lg"></i>
                            {{ $event->location }}
                        </li>
                        <li class="flex items-center gap-4 text-xs font-bold text-gray-700 uppercase">
                            <i class="bi bi-calendar-check text-amber-500 text-lg"></i>
                            {{ $event->start_at->format('d F Y') }}
                        </li>
                        <li class="flex items-center gap-4 text-xs font-bold text-gray-700 uppercase">
                            <i class="bi bi-clock text-amber-500 text-lg"></i>
                            {{ $event->start_at->format('H:i') }} - {{ $event->end_at->format('H:i') }}
                        </li>
                    </ul>
                </div>

                <div class="sticky top-8">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="h-6 w-1 bg-amber-500 rounded-full"></div>
                        <h2 class="text-sm font-black text-gray-900 uppercase tracking-widest">
                            {{ $event->status == 0 ? 'Event Mendatang Lainnya' : 'Kenangan Lainnya' }}
                        </h2>
                    </div>

                    <div class="space-y-4">
                        {{-- Logika filter: Jika event aktif status 0, tampilkan status 0. Jika status 1, tampilkan status 1 --}}
                        @foreach ($otherMemories->where('status', $event->status) as $memory)
                            <a href="{{ route('event.journey.show', $memory->slug) }}" wire:navigate
                                class="group flex gap-4 items-center">
                                <div class="w-20 h-20 flex-none rounded-2xl overflow-hidden shadow-sm bg-gray-200">
                                    <img src="{{ asset('storage/event/' . $memory->image_url) }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                </div>
                                <div class="space-y-1">
                                    <span
                                        class="text-[9px] font-bold text-amber-600 uppercase italic">{{ $memory->start_at->format('d M Y') }}</span>
                                    <h4
                                        class="text-xs font-black text-gray-900 uppercase leading-snug group-hover:text-amber-500 transition">
                                        {{ $memory->name }}
                                    </h4>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
