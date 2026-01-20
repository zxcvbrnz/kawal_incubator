<section class="bg-amber-50 py-20">
    <div class="max-w-7xl mx-auto px-6">

        <div class="max-w-2xl" data-aos="fade-up">
            <h2 class="text-xl font-semibold text-gray-900">
                Pusat Inovasi & Kreativitas
            </h2>
            <p class="mt-4 text-gray-500">
                Kawal Incubator adalah ruang kolaborasi untuk para kreator dan wirausaha. Kami mendampingi Anda
                mentransformasi ide kreatif menjadi bisnis yang berdaya saing global melalui ekosistem pendukung yang
                komprehensif.
            </p>
        </div>

        <div class="mt-14 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($programs as $program)
                <div class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition border border-amber-100 flex flex-col"
                    data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">

                    <div class="overflow-hidden h-52">
                        <img src="{{ asset('storage/program/' . $program->image_url) }}" alt="{{ $program->name }}"
                            class="h-full w-full object-contain group-hover:scale-105 transition duration-500">
                    </div>

                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-amber-600 transition">
                            {{ $program->name }}
                        </h3>

                        <p class="mt-2 text-sm text-gray-600 line-clamp-3">
                            {{ $program->description }}
                        </p>

                        <div class="mt-auto pt-4">
                            <a href="{{ route('program.show', ['id' => $program->id, 'name' => str($program->name)->slug()]) }}"
                                class="text-xs font-bold text-amber-500 group-hover:underline uppercase tracking-wider">
                                Learn More →
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Tampilan Mewah Jika Data Kosong --}}
                <div class="col-span-full py-16 bg-white/50 border-2 border-dashed border-amber-200 rounded-3xl flex flex-col items-center justify-center text-center px-6"
                    data-aos="fade-up">
                    <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mb-6 shadow-sm">
                        <svg class="w-10 h-10 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-gray-900 font-bold uppercase tracking-widest text-sm mb-2">Belum Ada Program Aktif
                    </h3>
                    <p class="text-gray-500 text-xs uppercase tracking-[0.2em] max-w-xs leading-relaxed">
                        Kami sedang mempersiapkan kurikulum terbaik untuk Anda. Cek kembali dalam waktu dekat!
                    </p>
                </div>
            @endforelse
        </div>

        @if ($programs->isNotEmpty())
            <div class="mt-16 text-center" data-aos="zoom-in">
                <a href="{{ route('program') }}"
                    class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-sm text-white font-semibold px-8 py-3 rounded-full transition shadow-md hover:shadow-lg">
                    Lihat Semua Program
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z" />
                    </svg>
                </a>
            </div>
        @endif
    </div>
</section>
