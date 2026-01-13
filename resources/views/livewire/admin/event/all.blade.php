<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-5">
        <div>
            <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Manajemen Event</h1>
            <p class="text-sm text-gray-500">Kelola jadwal dan galeri kegiatan incubator.</p>
        </div>
        <div class="flex items-center gap-4 w-full md:w-auto">
            <div class="relative group w-full md:w-72">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari event..."
                    class="w-full pl-12 pr-6 py-3 bg-white border border-gray-100 rounded-2xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all font-bold text-sm shadow-sm">
                <div class="absolute left-4 top-3.5 text-gray-300 group-focus-within:text-amber-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.event.create') }}" wire:navigate
                class="px-6 py-3 bg-amber-500 text-white rounded-2xl font-black shadow-lg shadow-amber-200 text-xs uppercase tracking-widest whitespace-nowrap">
                + Event Baru
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($events as $event)
            <div
                class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden flex flex-col group hover:shadow-xl transition-all duration-500">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('storage/event/' . $event->image_url) }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute top-4 right-4">
                        <span
                            class="px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-widest {{ $event->status ? 'bg-gray-800 text-white' : 'bg-amber-500 text-white animate-pulse' }}">
                            {{ $event->status ? 'Selesai' : 'Berjalan' }}
                        </span>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <h3 class="font-black text-gray-900 uppercase text-lg mb-2 leading-tight">{{ $event->name }}</h3>
                    <p class="text-xs text-gray-400 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                        </svg>
                        {{ $event->location }}
                    </p>
                    <div class="flex justify-between items-center mt-auto pt-4 border-t border-gray-50">
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                            {{ $event->start_at->format('d M Y') }}
                        </span>
                        <a href="{{ route('admin.event.edit', $event->id) }}" wire:navigate
                            class="text-amber-500 font-black text-xs uppercase hover:underline">Detail Edit</a>
                    </div>
                </div>
            </div>
        @empty
            <div
                class="col-span-1 md:col-span-2 lg:col-span-3 bg-white rounded-[2.5rem] py-24 px-6 text-center border-2 border-dashed border-gray-100 flex flex-col items-center">
                <div class="mb-6 p-5 bg-amber-50 rounded-full">
                    <svg class="w-10 h-10 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-gray-900 font-black uppercase tracking-tight text-lg mb-2">
                    {{ $search ? 'Pencarian Tidak Ditemukan' : 'Belum ada Event' }}
                </h3>
                <p class="text-gray-400 font-bold uppercase tracking-widest italic text-[10px] max-w-xs mx-auto">
                    @if ($search)
                        Tidak ada event dengan kata kunci <span class="text-amber-500">"{{ $search }}"</span>
                    @else
                        Belum ada daftar event yang ditambahkan
                    @endif
                </p>

                @if ($search)
                    <button wire:click="$set('search', '')"
                        class="mt-8 text-[10px] font-black text-amber-600 uppercase tracking-[0.2em] border-b-2 border-amber-100 hover:border-amber-500 transition-all pb-1">
                        Bersihkan Pencarian
                    </button>
                @endif
            </div>
        @endforelse
    </div>

    @if ($events->isNotEmpty())
        <div class="p-6">
            {{ $events->links('vendor.pagination.custom-amber') }}
        </div>
    @endif
</div>
