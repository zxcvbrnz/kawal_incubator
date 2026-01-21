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
            <h1 class="text-3xl font-black text-gray-900 tracking-tight uppercase">Tambah Video Baru</h1>
            <p class="text-sm text-gray-400 uppercase tracking-widest font-bold">Materi Pembelajaran & Konten Digital
            </p>
        </div>
    </div>

    <form wire:submit.prevent="store" class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        {{-- Sisi Kiri: Form Input --}}
        <div class="lg:col-span-8 space-y-6">
            <div class="bg-white p-8 rounded-[3rem] shadow-sm border border-gray-100">
                <div class="space-y-6">
                    {{-- Judul Video --}}
                    <div>
                        <div class="flex justify-between items-end px-2">
                            <label class="text-[10px] font-black text-gray-400 uppercase">Judul Video</label>
                            <span class="text-[9px] font-bold text-amber-600 uppercase tracking-tight">
                                * Gunakan judul yang singkat dan informatif
                            </span>
                        </div>
                        <input type="text" wire:model="judul"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-bold text-gray-700 placeholder-gray-300"
                            placeholder="Contoh: Dasar-dasar Robotika Part 1">
                        @error('judul')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Tipe & Link --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="md:col-span-1">
                            <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Tipe Platform</label>
                            <select wire:model.live="type"
                                class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-bold text-gray-700">
                                <option value="youtube">YouTube</option>
                                <option value="gdrive">Google Drive</option>
                                <option value="embed">Custom Embed</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="text-[10px] font-black text-gray-400 uppercase ml-2">URL / Link Video</label>
                            <input type="text" wire:model.live.debounce.500ms="link_video"
                                class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-bold text-gray-700 text-sm"
                                placeholder="Masukkan tautan video...">
                            @error('link_video')
                                <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Deskripsi Materi</label>
                        <textarea wire:model="deskripsi" rows="5"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-medium text-gray-700 placeholder-gray-300"
                            placeholder="Jelaskan ringkasan materi yang dibahas dalam video ini..."></textarea>
                        @error('deskripsi')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit"
                class="w-full py-5 bg-amber-500 hover:bg-amber-600 text-white rounded-[2rem] font-black shadow-xl shadow-amber-200 transition-all active:scale-95 uppercase tracking-[0.2em] text-xs">
                Terbitkan Video
            </button>
        </div>

        {{-- Sisi Kanan: Video Preview --}}
        <div class="lg:col-span-4">
            <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-gray-100 text-center sticky top-6">
                <label class="text-[10px] font-black text-gray-400 uppercase block mb-4 tracking-widest">Live
                    Preview</label>

                <div
                    class="relative aspect-video bg-gray-900 rounded-[2rem] overflow-hidden border-4 border-white shadow-md mb-6 flex items-center justify-center">
                    @if ($type == 'youtube' && $link_video)
                        @php
                            parse_str(parse_url($link_video, PHP_URL_QUERY), $v);
                            $vid = $v['v'] ?? basename($link_video);
                        @endphp
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $vid }}"
                            frameborder="0"></iframe>
                    @elseif($type == 'gdrive' && $link_video)
                        <iframe class="w-full h-full" src="{{ str_replace('/view', '/preview', $link_video) }}"
                            frameborder="0"></iframe>
                    @elseif($type == 'embed' && $link_video)
                        <div class="w-full h-full scale-75">{!! $link_video !!}</div>
                    @else
                        <div class="text-center p-6">
                            <svg class="w-12 h-12 text-gray-200 mx-auto mb-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                </path>
                            </svg>
                            <p class="text-[10px] font-black text-gray-300 uppercase italic">Menunggu Link Video</p>
                        </div>
                    @endif
                </div>

                <div class="p-4 bg-amber-50 rounded-2xl border border-amber-100">
                    <p class="text-[9px] text-amber-700 uppercase font-black tracking-widest leading-relaxed">
                        Status Preview: {{ $link_video ? 'Tersambung' : 'Belum Ada Data' }}
                    </p>
                </div>

                <p class="mt-6 text-[9px] text-gray-400 uppercase leading-relaxed">
                    Pastikan pengaturan privasi video Anda diset ke "Public" atau "Anyone with the link" agar dapat
                    diputar oleh pengguna.
                </p>
            </div>
        </div>
    </form>
</div>
