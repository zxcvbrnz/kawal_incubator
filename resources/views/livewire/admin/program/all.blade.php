<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-5 mb-10">
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight uppercase">Daftar Program</h1>
            <p class="text-sm text-gray-400 font-bold uppercase tracking-widest">Kelola program inkubasi & pelatihan</p>
        </div>

        <div class="flex items-center gap-4">
            <div class="relative group w-full md:w-72">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari program..."
                    class="w-full pl-12 pr-6 py-3 bg-white border border-gray-100 rounded-2xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all font-bold text-sm shadow-sm">
                <div class="absolute left-4 top-3.5 text-gray-300 group-focus-within:text-amber-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <a href="{{ route('admin.program.create') }}" wire:navigate
                class="px-6 py-3 bg-amber-500 text-white rounded-2xl font-black shadow-lg shadow-amber-200 uppercase text-xs tracking-widest">
                + Tambah
            </a>
        </div>
    </div>

    @if ($programs->isEmpty())
        {{-- Enhanced Empty State Program --}}
        <div
            class="bg-white rounded-[2.5rem] py-24 px-6 text-center border-2 border-dashed border-gray-100 flex flex-col items-center">
            <div class="mb-6 p-5 bg-amber-50 rounded-full">
                <svg class="w-10 h-10 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9.663 17h4.674M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                    </path>
                </svg>
            </div>

            <h3 class="text-gray-900 font-black uppercase tracking-tight text-lg mb-2">
                {{ $search ? 'Program Tidak Ditemukan' : 'Belum Ada Program' }}
            </h3>

            <p class="text-gray-400 font-bold uppercase tracking-widest italic text-[10px] max-w-xs mx-auto">
                @if ($search)
                    Pencarian <span class="text-amber-500">"{{ $search }}"</span> tidak membuahkan hasil.
                @else
                    Klik tombol tambah untuk membuat program pelatihan pertama Anda.
                @endif
            </p>

            @if ($search)
                <button wire:click="$set('search', '')"
                    class="mt-8 text-[10px] font-black text-amber-600 uppercase tracking-[0.2em] border-b-2 border-amber-100 hover:border-amber-500 transition-all pb-1">
                    Bersihkan Pencarian
                </button>
            @endif
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($programs as $program)
                <div wire:key="prog-{{ $program->id }}"
                    class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden flex flex-col group hover:shadow-xl transition-all duration-500">
                    <div class="h-52 overflow-hidden relative">
                        <img src="{{ asset('storage/program/' . $program->image_url) }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <h3 class="font-black text-gray-900 uppercase text-lg mb-3 line-clamp-1">{{ $program->name }}
                        </h3>
                        <p class="text-gray-500 text-sm line-clamp-3 mb-6">{{ $program->description }}</p>
                        <div class="flex justify-between items-center mt-auto pt-5 border-t border-gray-50">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                {{ $program->created_at->format('d M Y') }}
                            </span>
                            <a href="{{ route('admin.program.edit', $program->id) }}" wire:navigate
                                class="text-amber-500 font-black text-xs uppercase hover:underline">Edit Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-10">
            {{ $programs->links('vendor.pagination.custom-amber') }}
        </div>
    @endif
</div>
