<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between mb-10">
        <div class="flex items-center gap-5">
            <div>
                <h1 class="text-3xl font-black text-gray-900 tracking-tight uppercase">Daftar Cerita</h1>
                <p class="text-sm text-gray-400">Kelola konten artikel dan berita</p>
            </div>
        </div>
        <a href="{{ route('admin.news.create') }}" wire:navigate
            class="px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white rounded-2xl font-black shadow-lg shadow-amber-200 transition-all uppercase text-xs tracking-widest">
            + Tambah Cerita
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($posts as $post)
            <div
                class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden flex flex-col group hover:shadow-xl transition-all duration-500">
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('storage/new/' . $post->image_url) }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                <div class="p-8">
                    <h3 class="font-black text-gray-900 uppercase text-lg mb-3 line-clamp-2">{{ $post->title }}</h3>
                    <p class="text-gray-500 text-sm line-clamp-3 mb-6">{{ Str::limit(strip_tags($post->content), 120) }}
                    </p>
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
</div>
