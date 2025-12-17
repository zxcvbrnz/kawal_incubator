<div class="min-h-screen py-20" x-on:page-changed.window="window.scrollTo({ top: 0, behavior: 'smooth' })">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-gray-900 tracking-tight">Latest News & Updates</h1>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                Discover our latest stories, achievements, and technical insights from the world of innovation.
            </p>
            <div class="mt-6 h-1 w-24 bg-amber-500 mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($posts as $post)
                <a href="{{ route('new.show', ['slug' => $post->slug]) }}" wire:navigate
                    class="group relative aspect-[3/4] rounded-2xl overflow-hidden shadow-lg transition-all duration-500 hover:shadow-2xl">
                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
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
                <div class="col-span-full py-20 text-center">
                    <p class="text-gray-500 italic">No news found...</p>
                </div>
            @endforelse
        </div>
        <div class="mt-20">
            {{ $posts->links('vendor.pagination.custom-amber') }}
        </div>
    </div>
</div>
