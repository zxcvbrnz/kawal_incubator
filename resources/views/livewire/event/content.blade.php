<div class="min-h-screen bg-white pb-16">
    <div class="max-w-7xl mx-auto px-6">
        {{-- Header Section --}}
        <div class="mb-10">
            <h1 class="text-2xl font-black text-gray-900 tracking-tight uppercase">
                Event <span class="text-amber-500">Mendatang</span>
            </h1>
            <p class="text-gray-500 mt-1 text-sm">
                Selalu update dengan aktivitas terbaru kami.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($events as $event)
                <div
                    class="w-full group bg-white rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-amber-100/50 transition-all duration-500 overflow-hidden">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset('storage/event/' . $event->image_url) }}" alt="{{ $event->name }}"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">

                        {{-- Date Badge --}}
                        <div
                            class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-xl text-center shadow-lg border border-white/50">
                            <span class="block text-xl font-black text-gray-900 leading-none">
                                {{ $event->start_at->format('d') }}
                            </span>
                            <span class="block text-[10px] font-bold text-amber-600 uppercase tracking-tighter">
                                {{ $event->start_at->format('M Y') }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center gap-2 text-amber-600 mb-2">
                            <i class="bi bi-geo-alt-fill text-[12px]"></i>
                            <span class="text-[10px] font-bold uppercase tracking-widest truncate">
                                {{ $event->location }}
                            </span>
                        </div>

                        <h3
                            class="text-lg font-bold text-gray-900 group-hover:text-amber-600 transition duration-300 leading-tight line-clamp-1">
                            {{ $event->name }}
                        </h3>

                        <p class="mt-3 text-gray-500 text-sm leading-relaxed line-clamp-2">
                            {{ $event->description }}
                        </p>

                        <div class="mt-4 border-t border-gray-50 flex items-center justify-between pt-4">
                            <div class="flex items-center text-gray-400 gap-2">
                                <i class="bi bi-clock text-[12px]"></i>
                                <span class="text-xs font-medium">
                                    {{ $event->start_at->format('H:i') }} - {{ $event->end_at->format('H:i') }}
                                </span>
                            </div>

                            {{-- Tombol Detail Baru --}}
                            <a href="{{ route('event.show', $event->slug) }}" wire:navigate
                                class="inline-flex items-center gap-1.5 text-[10px] font-black uppercase tracking-widest text-amber-600 hover:text-amber-700 transition-colors group/btn">
                                Detail
                                <svg class="w-3.5 h-3.5 transform group-hover/btn:translate-x-0.5 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Empty State --}}
                <div class="col-span-full py-32 flex flex-col items-center justify-center text-center">
                    <div class="relative mb-8">
                        {{-- Background Glow --}}
                        <div class="absolute inset-0 bg-amber-400 opacity-20 blur-[60px] rounded-full"></div>

                        {{-- Icon Box --}}
                        <div
                            class="relative flex items-center justify-center w-28 h-28 bg-gradient-to-br from-amber-50 to-white rounded-[2.5rem] border border-amber-100 shadow-sm">
                            <svg class="w-12 h-12 text-amber-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            {{-- Decorative Dot --}}
                            <div
                                class="absolute -top-1 -right-1 w-4 h-4 bg-amber-500 rounded-full border-4 border-white">
                            </div>
                        </div>
                    </div>

                    <div class="max-w-md px-6">
                        <h3 class="text-2xl font-black text-gray-900 uppercase tracking-tight mb-3">
                            Belum Ada <span class="text-amber-500">Event</span>
                        </h3>
                        <p class="text-gray-500 leading-relaxed text-sm mb-10 uppercase tracking-[0.1em]">
                            Jadwal kami sedang disusun kembali. Pastikan Anda kembali lagi nanti untuk informasi menarik
                            lainnya.
                        </p>

                        <a href="/" wire:navigate
                            class="inline-flex items-center gap-3 px-10 py-4 bg-gray-900 text-white rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] transition-all hover:bg-amber-600 hover:shadow-xl hover:shadow-amber-200 active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7 7-7"></path>
                            </svg>
                            Eksplorasi Beranda
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        @if ($events->isNotEmpty())
            <div class="mt-20">
                {{ $events->links('vendor.pagination.custom-amber') }}
            </div>
        @endif
    </div>
</div>
