<div class="min-h-screen py-12">
    <div class="pt-20 max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-12">

            <main class="lg:w-2/3">
                <article class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm border border-amber-100">
                    <div class="relative aspect-video">
                        <img src="{{ asset('storage/program/' . $program->image_url) }}" alt="{{ $program->name }}"
                            class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent lg:hidden"></div>
                        <div class="absolute bottom-6 left-6 lg:hidden">
                            <span
                                class="bg-amber-500 text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest">
                                Program Unggulan
                            </span>
                        </div>
                    </div>

                    <div class="p-8 lg:p-12">
                        <div class="hidden lg:flex items-center gap-4 mb-6">
                            <span
                                class="bg-amber-100 text-amber-700 px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest">
                                PROGRAM
                            </span>
                            <span class="text-gray-400 text-sm italic">Terdaftar</span>
                        </div>

                        <h1 class="text-2xl lg:text-4xl font-extrabold text-gray-900 leading-tight mb-8">
                            {{ $program->name }}
                        </h1>

                        <div
                            class="prose prose-amber prose-lg max-w-none text-gray-600 leading-relaxed whitespace-pre-wrap">
                            {!! $program->description !!}
                        </div>

                        <div class="mt-12 pt-8 border-t border-gray-100">
                            <a href="https://wa.me/628xxxxxxx" target="_blank"
                                class="inline-flex items-center justify-center gap-4 bg-amber-500 text-white px-8 py-4 rounded-2xl font-bold hover:bg-amber-600 transition-all shadow-lg shadow-amber-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Daftar Program Sekarang
                            </a>
                        </div>
                    </div>
                </article>
            </main>

            <aside class="lg:w-1/3">
                <div class="sticky top-8">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="h-8 w-1.5 bg-amber-500 rounded-full"></div>
                        <h2 class="text-xl font-bold text-gray-900">Program Lainnya</h2>
                    </div>

                    <div class="space-y-4">
                        @foreach ($otherPrograms as $item)
                            <a href="{{ route('program.show', $item->id) }}"
                                class="group flex gap-4 bg-white p-3 rounded-2xl border border-transparent hover:border-amber-200 hover:shadow-md transition-all duration-300">

                                <div class="w-24 h-24 flex-none rounded-xl overflow-hidden shadow-inner">
                                    <img src="{{ asset('storage/' . $item->image_url) }}" alt="{{ $item->name }}"
                                        class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                                </div>

                                <div class="flex flex-col justify-center">
                                    <h4
                                        class="text-sm font-bold text-gray-900 leading-snug line-clamp-2 group-hover:text-amber-600 transition">
                                        {{ $item->name }}
                                    </h4>
                                    <span
                                        class="text-[10px] text-gray-400 mt-2 flex items-center gap-1 uppercase font-semibold">
                                        Lihat Detail
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </aside>

        </div>
    </div>
</div>
