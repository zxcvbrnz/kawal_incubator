<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-5 mb-10">
        <div class="flex items-center gap-5">
            <div>
                <h1 class="text-3xl font-black text-gray-900 tracking-tight uppercase">Daftar Cerita</h1>
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

    {{-- Empty State jika hasil pencarian tidak ditemukan --}}
    @if ($posts->isEmpty())
        <div class="text-center">
            <p class="text-gray-400 font-bold uppercase tracking-widest italic">Tidak ada cerita ditemukan untuk
                "{{ $search }}"</p>
        </div>
    @else
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
