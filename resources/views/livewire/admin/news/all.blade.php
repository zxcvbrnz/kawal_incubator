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
                + Buat Cerita
            </a>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-x-auto">
        @if ($posts->isEmpty())
            {{-- Enhanced Empty State --}}
            <div
                class="bg-white rounded-[2.5rem] py-24 px-6 text-center border-2 border-dashed border-gray-100 flex flex-col items-center">
                <div class="mb-6 p-5 bg-amber-50 rounded-full">
                    <svg class="w-10 h-10 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                    </svg>
                </div>

                <h3 class="text-gray-900 font-black uppercase tracking-tight text-lg mb-2">
                    {{ $search ? 'Pencarian Tidak Ditemukan' : 'Belum Ada Berita' }}
                </h3>

                <p class="text-gray-400 font-bold uppercase tracking-widest italic text-[10px] max-w-xs mx-auto">
                    @if ($search)
                        Tidak ada cerita yang cocok dengan kata kunci <span
                            class="text-amber-500">"{{ $search }}"</span>
                    @else
                        Database berita Anda masih kosong. Mulai buat berita pertama Anda sekarang.
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
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Berita</th>
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Konten
                            Singkat</th>
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Tanggal
                            Rilis</th>
                        <th
                            class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach ($posts as $post)
                        <tr wire:key="post-{{ $post->id }}" class="hover:bg-amber-50/30 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <img src="{{ asset('storage/new/' . $post->image_url) }}"
                                        class="w-12 h-12 rounded-xl object-cover border border-gray-100">
                                    <span class="font-bold text-gray-800 line-clamp-1">{{ $post->title }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm">
                                    <p class="text-gray-500 line-clamp-1">
                                        {{ Str::limit(strip_tags($post->content), 80) }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                    {{ $post->created_at->format('d M Y') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a wire:navigate href="{{ route('admin.news.edit', $post->id) }}"
                                    class="inline-block p-2 text-amber-500 hover:bg-amber-50 rounded-xl transition duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-6">
                {{ $posts->links('vendor.pagination.custom-amber') }}
            </div>
        @endif
    </div>
</div>
