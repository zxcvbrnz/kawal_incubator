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
            <h1 class="text-3xl font-black text-gray-900 tracking-tight uppercase">Edit Event</h1>
            <p class="text-sm text-gray-400">Selesaikan event dan upload gambar dokumentasi</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        {{-- Sisi Kiri: Form Utama --}}
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white p-10 rounded-[3rem] shadow-sm border border-gray-100">
                <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tight mb-8">Informasi Event</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <div class="flex justify-between items-end px-2">
                            <label class="text-[10px] font-black text-gray-400 uppercase">Nama Event</label>
                            {{-- Info Tambahan untuk Slug --}}
                            <span class="text-[9px] font-bold text-amber-600 uppercase tracking-tight">
                                * Hindari simbol seperti / , ? , # , & , " untuk keamanan link
                            </span>
                        </div>
                        <input type="text" wire:model="name"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-bold">
                        @error('name')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Deskripsi Singkat</label>
                        <textarea wire:model="description" rows="3"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-medium text-gray-700"></textarea>
                        @error('description')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Mulai</label>
                        <input type="datetime-local" wire:model="start_at"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500">
                        @error('start_at')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Selesai</label>
                        <input type="datetime-local" wire:model="end_at"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500">
                        @error('end_at')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Lokasi</label>
                        <input type="text" wire:model="location"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-bold">
                        @error('location')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Status</label>
                        <select wire:model.live="status"
                            class="w-full mt-1 px-5 py-3 {{ $status ? 'bg-gray-100 text-gray-500' : 'bg-amber-50 text-amber-600' }} border-none rounded-2xl font-black uppercase text-xs tracking-widest">
                            <option value="0">Berjalan (Active)</option>
                            <option value="1">Selesai (Finished)</option>
                        </select>
                        @error('status')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 mt-10">
                    <button wire:click="update" wire:loading.attr="disabled"
                        class="py-4 bg-amber-500 text-white rounded-2xl font-black shadow-xl shadow-amber-200 transition active:scale-95 uppercase tracking-widest text-xs flex items-center justify-center gap-2">
                        <span wire:loading.remove wire:target="update">Simpan Perubahan</span>
                        <span wire:loading wire:target="update">Memproses...</span>
                    </button>

                    <button type="button" onclick="confirmDelete({{ $event->id }})"
                        class="py-4 bg-white border-2 border-red-50 text-red-400 rounded-2xl font-black uppercase text-[10px] tracking-widest hover:bg-red-50 transition-all">
                        Hapus Event
                    </button>
                </div>
            </div>

            {{-- Galeri Foto --}}
            @if ($status == 1)
                <div id="all-image" class="bg-white p-10 rounded-[3rem] shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-8">
                        <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tight">Galeri Foto</h2>
                        <label
                            class="px-5 py-2 bg-gray-900 text-white rounded-xl text-[10px] font-black uppercase cursor-pointer hover:bg-black transition flex items-center gap-2">
                            <span wire:loading.remove wire:target="gallery_photos">+ Tambah Foto</span>
                            <span wire:loading wire:target="gallery_photos">Mengunggah...</span>
                            <input type="file" wire:model="gallery_photos" multiple class="hidden" accept="image/*">
                        </label>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        {{-- Existing Images --}}
                        @foreach ($event->images as $img)
                            <div
                                class="group relative aspect-square rounded-[2rem] overflow-hidden border border-gray-100">
                                <img src="{{ asset('storage/event/' . $img->image_url) }}"
                                    class="w-full h-full object-cover">
                                <button wire:click="deleteImage({{ $img->id }})"
                                    class="absolute inset-0 bg-red-500/90 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <span class="text-white font-black uppercase text-[10px]">Hapus</span>
                                </button>
                            </div>
                        @endforeach

                        {{-- Loading State for Gallery --}}
                        <div wire:loading wire:target="gallery_photos"
                            class="aspect-square rounded-[2rem] border-2 border-dashed border-amber-500 flex items-center justify-center bg-amber-50/50">
                            <svg class="animate-spin h-8 w-8 text-amber-500" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{-- Sisi Kanan: Cover Utama --}}
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-gray-100 text-center">
                <label class="text-[10px] font-black text-gray-400 uppercase block mb-4 tracking-widest">Cover
                    Utama</label>

                <div
                    class="relative aspect-[3/4] rounded-[2rem] overflow-hidden bg-gray-50 border-4 border-white shadow-lg mb-6">
                    {{-- Cover Image --}}
                    @if ($new_cover)
                        <img src="{{ $new_cover->temporaryUrl() }}" class="w-full h-full object-cover">
                    @else
                        <img src="{{ asset('storage/event/' . $event->image_url) }}"
                            class="w-full h-full object-cover">
                    @endif

                    {{-- Loading Overlay Cover (Dead Center) --}}
                    <div wire:loading wire:target="new_cover"
                        class="absolute inset-0 z-10 bg-gray-900/60 backdrop-blur-sm flex items-center justify-center">
                        <div class="w-full h-full flex flex-col items-center justify-center">
                            <svg class="animate-spin h-10 w-10 text-amber-500 mb-3" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span
                                class="text-[10px] font-black uppercase tracking-widest text-white">Mengunggah...</span>
                        </div>
                    </div>
                </div>

                <label
                    class="block w-full py-3 bg-amber-50 text-amber-600 rounded-xl font-black text-[10px] uppercase cursor-pointer border border-amber-100 hover:bg-amber-100 transition">
                    Ganti Cover
                    <input type="file" wire:model="new_cover" class="hidden" accept="image/*">
                </label>

                @error('new_cover')
                    <span class="text-red-500 text-[10px] mt-2 block font-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</div>
