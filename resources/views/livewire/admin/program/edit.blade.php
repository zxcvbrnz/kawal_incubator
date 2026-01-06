<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    {{-- Header --}}
    <div class="flex items-center gap-5 mb-10">
        <a wire:navigate href="{{ route('admin.program') }}"
            class="group p-3 bg-white rounded-2xl shadow-sm border border-gray-100 hover:bg-amber-500 transition-all">
            <svg class="w-6 h-6 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight uppercase">Edit Program</h1>
            <p class="text-sm text-gray-400 uppercase font-bold tracking-tighter">ID: #{{ $program->id }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        {{-- Sisi Kiri: Form Input --}}
        <div class="lg:col-span-8 space-y-6">
            <div class="bg-white p-8 rounded-[3rem] shadow-sm border border-gray-100">
                <div class="space-y-6">
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Nama Program</label>
                        <input type="text" wire:model="name"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-bold text-gray-700">
                        @error('name')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Deskripsi Program</label>
                        <textarea wire:model="description" rows="8"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 text-gray-600 font-medium"></textarea>
                        @error('description')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex flex-col gap-4">
                <button wire:click="update" wire:loading.attr="disabled"
                    class="w-full py-4 bg-amber-500 text-white rounded-2xl font-black shadow-xl shadow-amber-200 uppercase text-xs tracking-widest flex items-center justify-center gap-2 transition-all active:scale-95 disabled:opacity-70">
                    <span wire:loading.remove wire:target="update">Update Program</span>
                    <span wire:loading wire:target="update">Memperbarui...</span>
                </button>

                <button type="button" onclick="confirmDelete({{ $program->id }})"
                    class="w-full py-4 bg-white border-2 border-red-50 text-red-400 rounded-2xl font-black uppercase text-[10px] tracking-widest hover:bg-red-50 transition-colors">
                    Hapus Program
                </button>
            </div>
        </div>

        {{-- Sisi Kanan: Banner Sidebar --}}
        <div class="lg:col-span-4">
            <div
                class="space-y-4 bg-white p-6 rounded-[2.5rem] shadow-sm border border-gray-100 sticky top-6 text-center">
                <label class="text-[10px] font-black text-gray-400 uppercase block mb-4 tracking-widest">Ganti
                    Banner</label>

                <div class="relative aspect-video bg-gray-50 rounded-2xl overflow-hidden border border-gray-100">
                    {{-- Gambar Banner --}}
                    @if ($new_image)
                        <img src="{{ $new_image->temporaryUrl() }}" class="w-full h-full object-cover">
                    @else
                        <img src="{{ asset('storage/program/' . $program->image_url) }}"
                            class="w-full h-full object-cover">
                    @endif

                    {{-- Loading Overlay (Dead Center) --}}
                    <div wire:loading wire:target="new_image"
                        class="absolute inset-0 z-10 bg-gray-900/60 backdrop-blur-sm flex items-center justify-center">
                        <div class="w-full h-full flex flex-col items-center justify-center">
                            <svg class="animate-spin h-10 w-10 text-amber-500 mb-3" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
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
                    class="block w-full py-3 bg-amber-50 text-center text-amber-600 rounded-xl font-black text-[10px] uppercase cursor-pointer border border-amber-100 hover:bg-amber-100 transition shadow-sm active:scale-95">
                    Ubah Banner
                    <input type="file" wire:model="new_image" class="hidden" accept="image/*">
                </label>

                @error('new_image')
                    <span class="text-red-500 text-[10px] mt-2 block font-bold text-center">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</div>
