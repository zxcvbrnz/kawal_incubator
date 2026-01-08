<div class="min-h-screen bg-white pb-20">
    <div class="max-w-5xl mx-auto px-6">
        <div class="space-y-8">
            @forelse ($events as $event)
                <div class="flex flex-col lg:flex-row gap-10 items-center" data-aos="fade-up">
                    <div class="w-full lg:w-3/5 grid grid-cols-12 gap-3">
                        <div class="col-span-8 overflow-hidden rounded-[1.5rem] shadow-sm bg-gray-100">
                            <img src="{{ asset('storage/event/' . $event->image_url) }}"
                                class="w-full h-[320px] object-cover hover:scale-105 transition-transform duration-700"
                                alt="{{ $event->name }}">
                        </div>

                        <div class="col-span-4 flex flex-col gap-3">
                            @foreach ($event->images->take(2) as $docImage)
                                <div class="h-[154px] overflow-hidden rounded-[1.2rem] shadow-sm bg-gray-100">
                                    <img src="{{ asset('storage/event/' . $docImage->image_url) }}"
                                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-700"
                                        alt="Documentation">
                                </div>
                            @endforeach

                            @if ($event->images->count() < 1)
                                <div
                                    class="h-[154px] bg-gray-50 rounded-[1.2rem] border border-dashed border-gray-200 flex items-center justify-center text-gray-300">
                                    <i class="bi bi-image text-2xl"></i>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="w-full lg:w-2/5 space-y-5">
                        <div class="space-y-1">
                            <span class="text-amber-500 font-bold text-[10px] uppercase tracking-widest italic">
                                {{ $event->start_at->format('d F Y') }}
                            </span>
                            <h2 class="text-2xl font-black text-gray-900 leading-tight uppercase">
                                {{ Str::beforeLast($event->name, ' ') }} <br>
                                <span class="text-amber-500 italic">{{ Str::afterLast($event->name, ' ') }}</span>
                            </h2>
                        </div>

                        <p class="text-gray-500 leading-relaxed text-sm italic">
                            "{{ Str::limit($event->description, 150) }}"
                        </p>

                        {{-- BAGIAN TOMBOL YANG DIUBAH --}}
                        <div class="pb-2">
                            <a href="{{ route('event.journey.show', $event->slug) }}" wire:navigate
                                class="group/link inline-flex items-center gap-4 py-2 px-4 -ml-4 rounded-full transition-all duration-300 hover:bg-amber-50">
                                <span
                                    class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-900 group-hover/link:text-amber-600 transition-colors">
                                    Jelajahi Kenangan
                                </span>
                                <div class="relative flex items-center">
                                    <div
                                        class="h-px w-8 bg-amber-500 group-hover/link:w-12 transition-all duration-500">
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-3 w-3 text-amber-500 opacity-0 -translate-x-2 group-hover/link:opacity-100 group-hover/link:translate-x-0 transition-all duration-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>
                        </div>

                        <div class="pt-4 border-t border-gray-100 flex items-center gap-3">
                            <div class="flex items-center gap-2 text-gray-400">
                                <i class="bi bi-geo-alt text-md"></i>
                                <span class="text-xs font-medium">{{ $event->location }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Bagian Empty State tetap sama --}}
                <div class="py-32 flex flex-col items-center justify-center text-center">
                    <div class="relative mb-10">
                        <div class="absolute inset-0 bg-amber-400 opacity-10 blur-[80px] rounded-full"></div>
                        <div
                            class="relative flex items-center justify-center w-32 h-32 bg-white rounded-full border border-amber-50 shadow-inner">
                            <svg class="w-12 h-12 text-amber-500/50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div
                                class="absolute inset-0 border-2 border-dashed border-amber-100 rounded-full animate-[spin_20s_linear_infinite]">
                            </div>
                        </div>
                    </div>
                    <div class="max-w-lg px-6">
                        <h3 class="text-2xl font-black text-gray-900 uppercase tracking-[0.2em] mb-4">
                            Jejak Belum <span class="text-amber-500">Terukir</span>
                        </h3>
                        <p class="text-gray-400 leading-relaxed text-sm italic mb-12">
                            "Setiap perjalanan besar dimulai dengan satu langkah. Saat ini kami sedang mengumpulkan
                            kepingan memori untuk diceritakan kepada Anda."
                        </p>
                        <a href="/" wire:navigate class="group inline-flex items-center gap-4 text-gray-900">
                            <span
                                class="text-[10px] font-black uppercase tracking-[0.3em] group-hover:text-amber-600 transition-colors">Kembali
                                Beranda</span>
                            <div class="w-12 h-px bg-amber-500 group-hover:w-20 transition-all duration-500"></div>
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
