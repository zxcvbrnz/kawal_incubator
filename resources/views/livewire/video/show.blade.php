<div class="min-h-screen py-12">
    <div class="max-w-7xl mx-auto pt-20 px-6">
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="flex-1">
                <div class="aspect-video bg-black rounded-xl overflow-hidden shadow-2xl">
                    @if ($video->type == 'youtube')
                        @php
                            parse_str(parse_url($video->link_video, PHP_URL_QUERY), $vars);
                            $videoId = $vars['v'] ?? basename($video->link_video);
                        @endphp
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1"
                            frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    @elseif($video->type == 'gdrive')
                        <iframe class="w-full h-full" src="{{ str_replace('/view', '/preview', $video->link_video) }}"
                            allow="autoplay"></iframe>
                    @else
                        <div class="w-full h-full">{!! $video->link_video !!}</div>
                    @endif
                </div>

                <h1 class="text-2xl font-bold mt-4 text-gray-900">{{ $video->judul }}</h1>

                <div class="mt-4 p-4 bg-gray-100 rounded-xl border border-gray-200">
                    <div class="flex items-center gap-4 mb-3">
                        <span
                            class="font-bold text-sm text-gray-700">{{ $video->created_at->isoFormat('D MMMM YYYY') }}</span>
                        <span
                            class="px-3 py-1 bg-amber-500 text-white text-xs font-bold rounded-full uppercase">{{ $video->type }}</span>
                    </div>
                    <div class="text-gray-800 text-sm leading-relaxed whitespace-pre-line">
                        {{ $video->deskripsi ?: 'Tidak ada deskripsi.' }}
                    </div>
                </div>
            </div>

            <div class="lg:w-[350px]">
                <h2 class="font-bold text-gray-800 mb-4">Video Lainnya</h2>
                <div class="space-y-4">
                    @foreach ($recommendations as $rec)
                        <a href="{{ route('video.show', $rec->id) }}" class="flex gap-3 group">
                            <div class="w-40 h-24 flex-shrink-0 bg-gray-200 rounded-lg overflow-hidden">
                                @if ($rec->type == 'youtube')
                                    @php
                                        parse_str(parse_url($rec->link_video, PHP_URL_QUERY), $vars_rec);
                                        $recId = $vars_rec['v'] ?? basename($rec->link_video);
                                    @endphp
                                    <img src="https://img.youtube.com/vi/{{ $recId }}/mqdefault.jpg"
                                        class="w-full h-full object-cover">
                                @else
                                    <div
                                        class="w-full h-full flex items-center justify-center bg-amber-50 text-amber-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-bold text-gray-800 line-clamp-2 group-hover:text-amber-600">
                                    {{ $rec->judul }}</h4>
                                <p class="text-[10px] text-gray-400 mt-1 uppercase font-bold">{{ $rec->type }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
