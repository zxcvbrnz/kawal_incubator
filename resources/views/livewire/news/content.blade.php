<div class="min-h-screen bg-white pt-4 pb-16">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($posts as $post)
                <a href="{{ route('new.show', ['slug' => $post->slug]) }}" wire:navigate
                    class="group relative aspect-[3/4] rounded-2xl overflow-hidden shadow-lg transition-all duration-500 hover:shadow-2xl">
                    <img src="{{ asset('storage/new/' . $post->image_url) }}" alt="{{ $post->title }}"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent group-hover:from-amber-900/80 transition-colors duration-500">
                    </div>
                    <div class="absolute bottom-0 p-6 w-full">
                        <span class="text-amber-400 text-xs uppercase tracking-widest">
                            {{ $post->created_at->format('d M Y') }}
                        </span>
                        <h3 class="mt-3 text-white leading-snug line-clamp-3 group-hover:text-amber-200 transition">
                            {{ $post->title }}
                        </h3>
                        <div
                            class="mt-4 flex items-center gap-2 text-amber-400 text-sm opacity-0 -translate-x-4 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-500">
                            Read Article
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full py-24 flex flex-col items-center justify-center">
                    <div class="relative mb-8">
                        <div class="absolute inset-0 bg-amber-200 blur-[50px] opacity-40 rounded-full animate-pulse">
                        </div>

                        <div
                            class="relative w-24 h-24 bg-white rounded-3xl border border-amber-100 shadow-sm flex items-center justify-center">
                            <svg class="w-10 h-10 text-amber-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <div class="max-w-sm text-center px-6">
                        <h3 class="text-2xl font-black text-gray-900 uppercase tracking-tight mb-3">
                            Belum Ada Berita
                        </h3>
                        <p class="text-gray-500 leading-relaxed text-sm mb-10 uppercase tracking-[0.1em]">
                            Kami sedang meracik berita menarik untuk Anda. Silakan kembali beberapa saat lagi.
                        </p>

                        <a href="/"
                            class="inline-flex items-center gap-3 px-8 py-4 bg-gray-900 text-white rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] transition-all hover:bg-amber-600 hover:shadow-xl hover:shadow-amber-200 active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7 7-7"></path>
                            </svg>
                            Kembali Ke Beranda
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
        @if ($posts->isNotEmpty())
            <div class="mt-20">
                {{ $posts->links('vendor.pagination.custom-amber') }}
            </div>
        @endif
    </div>
</div>
