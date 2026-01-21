<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    {{-- Header --}}
    <div class="flex items-center gap-5 mb-10">
        <a wire:navigate href="{{ route('admin.video') }}"
            class="group p-3 bg-white rounded-2xl shadow-sm border border-gray-100 hover:bg-amber-500 transition-all">
            <svg class="w-6 h-6 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight uppercase">Edit Video</h1>
            <p class="text-sm text-gray-400 font-bold uppercase tracking-widest text-[10px]">Perbarui materi dan detail
                konten pembelajaran</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        {{-- Sisi Kiri: Form Utama --}}
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white p-10 rounded-[3rem] shadow-sm border border-gray-100">
                <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tight mb-8">Informasi
                    Materi</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Judul Video --}}
                    <div class="md:col-span-2">
                        <div class="flex justify-between items-end px-2">
                            <label class="text-[10px] font-black text-gray-400 uppercase">Judul Video</label>
                            <span class="text-[9px] font-bold text-amber-600 uppercase tracking-tight italic">
                                * Muncul sebagai judul utama di halaman user
                            </span>
                        </div>
                        <input type="text" wire:model="judul"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-bold text-gray-700">
                        @error('judul')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Platform & Link --}}
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Platform</label>
                        <select wire:model.live="type"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-black text-xs uppercase tracking-widest">
                            <option value="youtube">YouTube</option>
                            <option value="gdrive">Google Drive</option>
                            <option value="embed">Custom Embed</option>
                        </select>
                        @error('type')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">URL / Source Link</label>
                        <input type="text" wire:model.live.debounce.500ms="link_video"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-bold text-sm">
                        @error('link_video')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="md:col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Deskripsi Lengkap</label>
                        <textarea wire:model="deskripsi" rows="6"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-medium text-gray-700 leading-relaxed"></textarea>
                        @error('deskripsi')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="grid grid-cols-1 gap-4 mt-10">
                    <button wire:click="update" wire:loading.attr="disabled"
                        class="py-4 bg-amber-500 text-white rounded-2xl font-black shadow-xl shadow-amber-200 transition active:scale-95 uppercase tracking-widest text-xs flex items-center justify-center gap-2">
                        <span wire:loading.remove wire:target="update">Simpan Perubahan</span>
                        <span wire:loading wire:target="update">Memproses...</span>
                    </button>

                    <button type="button" onclick="confirmDelete({{ $videoId }})"
                        class="py-4 bg-white border-2 border-red-50 text-red-400 rounded-2xl font-black uppercase text-[10px] tracking-widest hover:bg-red-50 transition-all">
                        Hapus Video
                    </button>
                </div>
            </div>
        </div>

        {{-- Sisi Kanan: Live Preview Player --}}
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-gray-100 text-center sticky top-6">
                <label class="text-[10px] font-black text-gray-400 uppercase block mb-4 tracking-widest">
                    Live Video Preview
                </label>

                <div
                    class="relative aspect-video rounded-[2rem] overflow-hidden bg-gray-900 border-4 border-white shadow-lg mb-6 flex items-center justify-center">
                    @if ($type == 'youtube' && $link_video)
                        @php
                            parse_str(parse_url($link_video, PHP_URL_QUERY), $v);
                            $vid = $v['v'] ?? basename($link_video);
                        @endphp
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $vid }}"
                            frameborder="0" allowfullscreen></iframe>
                    @elseif($type == 'gdrive' && $link_video)
                        <iframe class="w-full h-full" src="{{ str_replace('/view', '/preview', $link_video) }}"
                            frameborder="0" allowfullscreen></iframe>
                    @elseif($type == 'embed' && $link_video)
                        <div class="w-full h-full flex items-center justify-center overflow-hidden">
                            {!! $link_video !!}
                        </div>
                    @else
                        <div class="text-center p-6">
                            <svg class="w-12 h-12 text-gray-700 mx-auto mb-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            <p class="text-[9px] font-black text-gray-500 uppercase italic">Video tidak ditemukan</p>
                        </div>
                    @endif

                    {{-- Loading Overlay Preview --}}
                    <div wire:loading wire:target="link_video, type"
                        class="absolute inset-0 z-10 bg-gray-900/80 backdrop-blur-sm flex items-center justify-center">
                        <div class="flex flex-col items-center">
                            <svg class="animate-spin h-8 w-8 text-amber-500 mb-2" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span
                                class="text-[9px] font-black uppercase text-white tracking-widest">Sinkronisasi...</span>
                        </div>
                    </div>
                </div>

                {{-- Status Card --}}
                <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100 flex items-center justify-between">
                    <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest">ID Video:
                        #{{ $videoId }}</span>
                    <span
                        class="px-3 py-1 bg-amber-100 text-amber-600 rounded-lg text-[9px] font-black uppercase italic shadow-sm">
                        {{ $type }}
                    </span>
                </div>

                <p class="mt-6 text-[9px] text-gray-400 uppercase leading-relaxed px-4 italic">
                    Perubahan pada link video akan langsung memperbarui preview di atas secara real-time.
                </p>
            </div>
        </div>
    </div>
</div>
