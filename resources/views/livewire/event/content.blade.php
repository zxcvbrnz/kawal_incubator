<div class="min-h-screen bg-white pb-16">
    <div class="max-w-7xl mx-auto px-6"> {{-- Tambah px-6 agar tidak mepet layar --}}

        <div class="mb-10">
            <h1 class="text-2xl font-black text-gray-900 tracking-tight uppercase">
                Upcoming <span class="text-amber-500">Events</span>
            </h1>
            <p class="text-gray-500 mt-1 text-sm">
                Stay updated with our latest activities.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($events as $event)
                <div
                    class="w-full group bg-white rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-amber-100/50 transition-all duration-500 overflow-hidden">

                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset('storage/event/' . $event->image_url) }}" alt="{{ $event->name }}"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">

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
                                {{-- truncate agar teks lokasi tidak merusak layout --}}
                                {{ $event->location }}
                            </span>
                        </div>

                        <h3
                            class="text-lg font-bold text-gray-900 group-hover:text-amber-600 transition duration-300 leading-tight line-clamp-1">
                            {{-- line-clamp-1 agar tinggi kartu tetap simetris --}}
                            {{ $event->name }}
                        </h3>

                        <p class="mt-3 text-gray-500 text-sm leading-relaxed line-clamp-2">
                            {{ $event->description }}
                        </p>

                        <div class="mt-4 border-t border-gray-50 flex items-center justify-between">
                            <div class="flex items-center text-gray-400">
                                <i class="bi bi-clock text-[12px]"></i>
                                <span class="text-xs font-medium">
                                    {{ $event->start_at->format('H:i') }} - {{ $event->end_at->format('H:i') }}
                                </span>
                            </div>

                            {{-- <a href="" wire:navigate
                                class="p-1.5 bg-gray-900 text-white rounded-lg group-hover:bg-amber-500 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-20">
            {{ $events->links('vendor.pagination.custom-amber') }}
        </div>
    </div>
</div>
