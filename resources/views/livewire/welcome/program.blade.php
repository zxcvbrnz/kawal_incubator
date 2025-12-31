<section class="bg-amber-50 py-20">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Heading -->
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

        <!-- Program Grid -->
        <div class="mt-14 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($programs as $program)
                <div class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition border border-amber-100 flex flex-col"
                    data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">

                    <div class="overflow-hidden h-52">
                        {{-- Perbaikan: Pastikan ada slash (/) setelah folder program --}}
                        <img src="{{ asset('storage/program/' . $program->image_url) }}" alt="{{ $program->name }}"
                            class="h-full w-full object-cover group-hover:scale-105 transition duration-500">
                    </div>

                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-amber-600 transition">
                            {{ $program->name }}
                        </h3>

                        <p class="mt-2 text-sm text-gray-600 line-clamp-3">
                            {{-- Tips: Batasi teks agar kartu tetap sejajar --}}
                            {{ $program->description }}
                        </p>

                        {{-- <div class="mt-auto pt-4">
                            <span class="text-xs font-bold text-amber-500 group-hover:underline">
                                LEARN MORE →
                            </span>
                        </div> --}}
                    </div>
                </div>
            @empty
                {{-- Tampilan jika data kosong --}}
                <div class="col-span-full text-center py-10">
                    <p class="text-gray-400 italic">No programs available at the moment.</p>
                </div>
            @endforelse
        </div>
        <!-- CTA -->
        <div class="mt-16 text-center" data-aos="zoom-in">
            <a href="{{ route('program') }}"
                class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-sm text-white font-semibold px-8 py-3 rounded-full transition shadow-md hover:shadow-lg">
                Lihat Semua Program
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z" />
                </svg>
            </a>
        </div>
    </div>
</section>
