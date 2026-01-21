<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-5">
        <div>
            <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Manajemen Video</h1>
            <p class="text-sm text-gray-500">Kelola konten dan video pembelajaran incubator.</p>
        </div>
        <div class="flex items-center gap-4 w-full md:w-auto">
            <div class="relative group w-full md:w-72">
                <input type="text" wire:model.live="search" placeholder="Cari video..."
                    class="w-full pl-12 pr-6 py-3 bg-white border border-gray-100 rounded-2xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all font-bold text-sm shadow-sm">
                <div class="absolute left-4 top-3.5 text-gray-300 group-focus-within:text-amber-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.video.create') }}" wire:navigate
                class="px-6 py-3 bg-amber-500 text-white rounded-2xl font-black shadow-lg shadow-amber-200 text-xs uppercase tracking-widest whitespace-nowrap">
                + Video Baru
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($videos as $video)
            <div
                class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden flex flex-col group hover:shadow-xl transition-all duration-500">

                <div class="relative h-48 overflow-hidden bg-gray-900">
                    @if ($video->type == 'youtube')
                        <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/mqdefault.jpg"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-80 group-hover:opacity-100">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-50">
                            <svg class="w-12 h-12 text-amber-200" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif

                    <div class="absolute top-4 right-4">
                        <span
                            class="px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-widest bg-gray-800 text-white shadow-lg">
                            {{ $video->type }}
                        </span>
                    </div>

                    <div class="absolute inset-0 flex items-center justify-center">
                        <div
                            class="w-12 h-12 bg-amber-500 text-white rounded-full flex items-center justify-center shadow-xl transform scale-90 group-hover:scale-100 transition-transform duration-500">
                            <svg class="w-6 h-6 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 22v-20l18 10-18 10z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="p-6 flex-1 flex flex-col">
                    <h3 class="font-black text-gray-900 uppercase text-lg mb-2 leading-tight line-clamp-2 italic">
                        {{ $video->judul }}
                    </h3>
                    <p
                        class="text-[10px] text-gray-400 mb-4 font-bold uppercase tracking-[0.1em] line-clamp-2 leading-relaxed">
                        {{ $video->deskripsi ?: 'Tidak ada deskripsi tambahan untuk materi ini.' }}
                    </p>

                    <div class="flex justify-between items-center mt-auto pt-4 border-t border-gray-50">
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                            {{ $video->created_at->format('d M Y') }}
                        </span>
                        <a href="{{ route('admin.video.edit', $video->id) }}" wire:navigate
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
                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-gray-900 font-black uppercase tracking-tight text-lg mb-2">
                    {{ $search ? 'Pencarian Video Tidak Ditemukan' : 'Belum ada Video' }}
                </h3>
                <p class="text-gray-400 font-bold uppercase tracking-widest italic text-[10px] max-w-xs mx-auto">
                    @if ($search)
                        Tidak ada video dengan judul <span class="text-amber-500">"{{ $search }}"</span>
                    @else
                        Belum ada daftar video pembelajaran yang ditambahkan
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

    @if ($videos->isNotEmpty())
        <div class="p-6">
            {{ $videos->links('vendor.pagination.custom-amber') }}
        </div>
    @endif
</div>
