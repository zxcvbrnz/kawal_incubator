<div class="min-h-screen py-12">
    <div class="pt-20 max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-12">
            <main class="lg:w-2/3">
                <article class="bg-white rounded-3xl overflow-hidden shadow-sm border border-amber-100">
                    <div class="relative aspect-video">
                        <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent lg:hidden"></div>
                        <div class="absolute bottom-6 left-6 lg:hidden">
                            <span class="bg-amber-500 text-white px-3 py-1 rounded-full text-xs font-bold uppercase">
                                {{ $post->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>

                    <div class="p-8 lg:p-12">
                        <div class="hidden lg:flex items-center gap-4 mb-6">
                            <span
                                class="bg-amber-100 text-amber-700 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider">
                                {{ $post->category ?? 'Update' }}
                            </span>
                            <span class="text-gray-400 text-sm italic">{{ $post->created_at->format('d F Y') }}</span>
                        </div>

                        <h1 class="text-xl lg:text-2xl font-extrabold text-gray-900 leading-tight mb-8">
                            {{ $post->title }}
                        </h1>

                        <div
                            class="prose prose-amber prose-lg max-w-none text-gray-600 leading-relaxed whitespace-pre-wrap">
                            {!! $post->content !!}
                        </div>
                    </div>
                </article>
            </main>

            <aside class="lg:w-1/3">
                <div class="sticky top-8">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="h-8 w-1.5 bg-amber-500 rounded-full"></div>
                        <h2 class="text-xl font-bold text-gray-900">Another News</h2>
                    </div>
                    <div class="space-y-2">
                        @foreach ($recentPosts as $recent)
                            <a href="{{ route('new.show', $recent->slug) }}"
                                class="group flex gap-4 bg-white p-3 rounded-2xl border border-transparent hover:border-amber-200 hover:shadow-md transition-all duration-300">
                                <div class="w-24 h-24 flex-none rounded-xl overflow-hidden shadow-inner">
                                    <img src="{{ $recent->image_url }}" alt="{{ $recent->title }}"
                                        class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                                </div>
                                <div class="flex flex-col justify-center">
                                    <span
                                        class="text-[10px] font-bold text-amber-600 uppercase mb-1">{{ $recent->created_at->format('d M Y') }}</span>
                                    <h4
                                        class="text-sm font-bold text-gray-900 leading-snug line-clamp-2 group-hover:text-amber-600 transition">
                                        {{ $recent->title }}
                                    </h4>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </aside>

        </div>
    </div>
</div>
