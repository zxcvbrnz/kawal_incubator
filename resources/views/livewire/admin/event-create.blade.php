<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    {{-- Header --}}
    <div class="flex items-center gap-5 mb-10">
        <a wire:navigate href="{{ route('admin.event') }}"
            class="group p-3 bg-white rounded-2xl shadow-sm border border-gray-100 hover:bg-amber-500 transition-all">
            <svg class="w-6 h-6 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight uppercase">Buat Event Baru</h1>
            <p class="text-sm text-gray-400 uppercase tracking-widest font-bold">Langkah 1: Informasi Dasar & Cover</p>
        </div>
    </div>

    <form wire:submit.prevent="save" class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        {{-- Sisi Kiri: Form Input --}}
        <div class="lg:col-span-8 space-y-6">
            <div class="bg-white p-8 rounded-[3rem] shadow-sm border border-gray-100">
                <div class="space-y-6">
                    {{-- Nama Event --}}
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Nama Event</label>
                        <input type="text" wire:model="name"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-bold text-gray-700 placeholder-gray-300"
                            placeholder="Contoh: Workshop Digital Marketing">
                        @error('name')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Deskripsi Singkat</label>
                        <textarea wire:model="description" rows="3"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-medium text-gray-700"></textarea>
                        @error('description')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Lokasi --}}
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Lokasi / Link Meet</label>
                        <input type="text" wire:model="location"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-bold text-gray-700">
                        @error('location')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Waktu --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Waktu Mulai</label>
                            <input type="datetime-local" wire:model="start_at"
                                class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-bold text-gray-700">
                            @error('start_at')
                                <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Waktu Selesai</label>
                            <input type="datetime-local" wire:model="end_at"
                                class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-bold text-gray-700">
                            @error('end_at')
                                <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit"
                class="w-full py-5 bg-amber-500 hover:bg-amber-600 text-white rounded-[2rem] font-black shadow-xl shadow-amber-200 transition-all active:scale-95 uppercase tracking-[0.2em] text-xs">
                Buat Event & Lanjut ke Galeri
            </button>
        </div>

        {{-- Sisi Kanan: Upload Cover --}}
        <div class="lg:col-span-4">
            <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-gray-100 text-center sticky top-6">
                <label class="text-[10px] font-black text-gray-400 uppercase block mb-4 tracking-widest">Cover
                    Utama</label>

                <div
                    class="relative group aspect-[3/4] bg-gray-50 rounded-[2rem] overflow-hidden border-4 border-white shadow-md mb-6 flex items-center justify-center">
                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-cover">
                    @else
                        <div class="text-center p-6">
                            <svg class="w-12 h-12 text-gray-200 mx-auto mb-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <p class="text-[10px] font-black text-gray-300 uppercase italic">Belum ada foto</p>
                        </div>
                    @endif
                </div>

                <label
                    class="cursor-pointer block w-full py-4 bg-gray-900 text-white text-[10px] font-black uppercase rounded-2xl hover:bg-black transition tracking-widest">
                    Pilih Cover
                    <input type="file" wire:model="image" class="hidden">
                </label>
                @error('image')
                    <p class="text-red-500 text-[10px] mt-3 font-bold uppercase">{{ $message }}</p>
                @enderror

                <p class="mt-6 text-[9px] text-gray-400 uppercase leading-relaxed">
                    Tip: Gunakan gambar rasio 3:4 untuk hasil terbaik. Galeri foto dapat ditambahkan setelah event
                    dibuat.
                </p>
            </div>
        </div>
    </form>
</div>
