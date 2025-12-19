<div class="min-h-screen bg-white pt-4 pb-16">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse ($programs as $program)
                <div class="group bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-2xl hover:shadow-amber-100/50 transition-all duration-500 flex flex-col overflow-hidden"
                    data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 100 }}">

                    <div class="relative aspect-video overflow-hidden">
                        <img src="{{ asset('storage/program/' . $program->image_url) }}" alt="{{ $program->name }}"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                    </div>

                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-amber-600 transition duration-300">
                            {{ $program->name }}
                        </h3>

                        {{-- Deskripsi dibatasi 3 baris agar tinggi kartu tetap konsisten --}}
                        <p class="mt-3 text-gray-500 text-sm leading-relaxed line-clamp-3">
                            {{ $program->description }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <p class="text-gray-500 italic">No programs found...</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16 flex justify-center">
            {{ $programs->links('vendor.pagination.custom-amber') }}
        </div>

    </div>
</div>
