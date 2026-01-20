<div class="min-h-screen bg-white pt-4 pb-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse ($programs as $program)
                <div class="group bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-2xl hover:shadow-amber-100/50 transition-all duration-500 flex flex-col overflow-hidden"
                    data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 100 }}">

                    <div class="relative aspect-square overflow-hidden">
                        <img src="{{ asset('storage/program/' . $program->image_url) }}" alt="{{ $program->name }}"
                            class="w-full h-full object-contain transform group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                    </div>

                    <div class="p-6 flex flex-col flex-1">
                        <a href="{{ route('program.show', ['id' => $program->id, 'name' => str($program->name)->slug()]) }}"
                            wire:navigate>
                            <h3
                                class="text-xl font-bold text-gray-900 group-hover:text-amber-600 transition duration-300">
                                {{ $program->name }}
                            </h3>
                        </a>

                        <p class="mt-3 text-gray-500 text-sm leading-relaxed line-clamp-3">
                            {{ $program->description }}
                        </p>

                        <div class="mt-auto pt-6">
                            <a href="{{ route('program.show', ['id' => $program->id, 'name' => str($program->name)->slug()]) }}"
                                wire:navigate
                                class="inline-flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-amber-600 hover:text-amber-700 transition-all">
                                Lihat Detail
                                <svg class="w-3 h-3 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7-7 7M3 12h18"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-32 flex flex-col items-center justify-center text-center">
                    <div class="relative mb-8">
                        <div class="absolute inset-0 bg-amber-400 opacity-20 blur-[60px] rounded-full"></div>

                        <div
                            class="relative flex items-center justify-center w-28 h-28 bg-gradient-to-br from-amber-50 to-white rounded-[2.5rem] border border-amber-100 shadow-sm">
                            <svg class="w-12 h-12 text-amber-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M13 10V3L4 14h7v7l9-11h-7z">
                                </path>
                            </svg>
                            <div
                                class="absolute top-0 right-0 -mr-2 -mt-2 w-8 h-8 bg-amber-100 rounded-full blur-xl opacity-70">
                            </div>
                        </div>
                    </div>

                    <div class="max-w-md px-6">
                        <h3 class="text-2xl font-black text-gray-900 uppercase tracking-tight mb-3">
                            Belum Ada <span class="text-amber-500">Program</span>
                        </h3>
                        <p class="text-gray-500 leading-relaxed text-sm mb-10 uppercase tracking-[0.1em]">
                            Kami sedang merancang inisiatif baru untuk Anda. Nantikan pembaruan selanjutnya di halaman
                            ini.
                        </p>

                        <a href="/" wire:navigate
                            class="inline-flex items-center gap-3 px-10 py-4 bg-gray-900 text-white rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] transition-all hover:bg-amber-600 hover:shadow-xl hover:shadow-amber-200 active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7 7-7"></path>
                            </svg>
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        @if ($programs->isNotEmpty())
            <div class="mt-16 flex justify-center">
                {{ $programs->links('vendor.pagination.custom-amber') }}
            </div>
        @endif
    </div>
</div>
