<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-5 mb-10">
        <div class="flex items-center gap-5">
            <div>
                <h1 class="text-3xl font-black text-gray-900 tracking-tight uppercase">Daftar Berita</h1>
                <p class="text-sm text-gray-400">Kelola konten artikel dan berita</p>
            </div>
        </div>

        <div class="flex items-center gap-4">
            {{-- Input Search --}}
            <div class="relative group w-full md:w-72">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari judul cerita..."
                    class="w-full pl-12 pr-6 py-3 bg-white border border-gray-100 rounded-2xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all font-bold text-sm shadow-sm">
                <div class="absolute left-4 top-3.5 text-gray-300 group-focus-within:text-amber-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <a href="{{ route('admin.news.create') }}" wire:navigate
                class="px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white rounded-2xl font-black shadow-lg shadow-amber-200 transition-all uppercase text-xs tracking-widest flex-shrink-0">
                + Tambah
            </a>
        </div>
    </div>

    {{-- Logika Empty State --}}
    @if ($posts->isEmpty())
        <div
            class="bg-white rounded-[3rem] border border-gray-100 py-20 px-6 shadow-sm flex flex-col items-center text-center">
            <div class="relative mb-6">
                <div class="absolute inset-0 bg-amber-100 blur-2xl opacity-50 rounded-full"></div>
                <div class="relative p-6 bg-amber-50 rounded-full border border-amber-100">
                    <svg class="w-12 h-12 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                    </svg>
                </div>
            </div>

            @if ($search)
                {{-- Tampilan jika tidak ditemukan hasil pencarian --}}
                <h3 class="text-xl font-black text-gray-900 uppercase tracking-tight mb-2">Pencarian Tidak Ditemukan
                </h3>
                <p class="text-sm text-gray-400 max-w-xs mb-8">
                    Tidak ada cerita yang cocok dengan kata kunci <span
                        class="text-amber-600 font-bold">"{{ $search }}"</span>.
                </p>
                <button wire:click="$set('search', '')"
                    class="px-8 py-3 bg-gray-900 text-white rounded-xl font-black text-[10px] uppercase tracking-widest transition-all hover:bg-amber-600 active:scale-95">
                    Reset Pencarian
                </button>
            @else
                {{-- Tampilan jika data benar-benar kosong di database --}}
                <h3 class="text-xl font-black text-gray-900 uppercase tracking-tight mb-2">Belum Ada Berita</h3>
                <p class="text-sm text-gray-400 max-w-xs mb-8">
                    Database berita Anda masih kosong. Mulai buat berita pertama Anda sekarang.
                </p>
                <a href="{{ route('admin.news.create') }}" wire:navigate
                    class="px-8 py-3 bg-amber-500 text-white rounded-xl font-black text-[10px] uppercase tracking-widest shadow-lg shadow-amber-100 transition-all hover:bg-amber-600 active:scale-95">
                    Buat Berita Baru
                </a>
            @endif
        </div>
    @else
        {{-- Grid Data --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($posts as $post)
                <div wire:key="post-{{ $post->id }}"
                    class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden flex flex-col group hover:shadow-xl transition-all duration-500">
                    <div class="h-52 overflow-hidden relative">
                        <img src="{{ asset('storage/new/' . $post->image_url) }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-8">
                        <h3 class="font-black text-gray-900 uppercase text-lg mb-3 line-clamp-2">{{ $post->title }}
                        </h3>
                        <p class="text-gray-500 text-sm line-clamp-3 mb-6">
                            {{ Str::limit(strip_tags($post->content), 120) }}</p>
                        <div class="flex justify-between items-center pt-5 border-t border-gray-50">
                            <span
                                class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ $post->created_at->format('d M Y') }}</span>
                            <a href="{{ route('admin.news.edit', $post->id) }}" wire:navigate
                                class="text-amber-500 font-black text-xs uppercase hover:underline">Edit Cerita</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="p-6">
            {{ $posts->links('vendor.pagination.custom-amber') }}
        </div>
    @endif
</div>
