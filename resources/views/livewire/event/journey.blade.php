<div class="min-h-screen bg-white pb-20">
    <div class="max-w-5xl mx-auto px-6">
        <div class="space-y-8">
            @foreach ($events as $event)
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

                            {{-- Placeholder jika gambar dokumentasi kurang dari 2 --}}
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

                        <div class="pb-2">
                            <a href="{{ route('event.journey.show', $event->slug) }}" wire:navigate
                                class="group/link inline-flex items-center gap-3">
                                <span class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-900">Explore
                                    Memories</span>
                                <div class="h-px w-8 bg-amber-500 group-hover/link:w-12 transition-all duration-500">
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
            @endforeach
        </div>

        @if ($events->isEmpty())
            <div class="text-center py-20">
                <p class="text-gray-400 italic">No memories found yet.</p>
            </div>
        @endif
    </div>
    <div class="mt-20">
        {{ $events->links('vendor.pagination.custom-amber') }}
    </div>
</div>
