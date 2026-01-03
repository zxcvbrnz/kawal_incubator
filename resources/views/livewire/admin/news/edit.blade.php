<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="flex items-center gap-5 mb-10">
        <a wire:navigate href="{{ route('admin.news') }}"
            class="group p-3 bg-white rounded-2xl shadow-sm border border-gray-100 hover:bg-amber-500 transition-all">
            <svg class="w-6 h-6 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight uppercase">Edit Cerita</h1>
            <p class="text-sm text-gray-400">Perbarui konten cerita Anda</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <div class="lg:col-span-8 space-y-6">
            <div class="bg-white p-8 rounded-[3rem] shadow-sm border border-gray-100">
                <div class="space-y-6">
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Judul Cerita</label>
                        <input type="text" wire:model="title"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-bold">
                        @error('title')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Isi Cerita</label>
                        <textarea wire:model="content" rows="12"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500"></textarea>
                        @error('content')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-4">
                <button wire:click="update"
                    class="w-full py-4 bg-amber-500 text-white rounded-2xl font-black shadow-xl shadow-amber-200 uppercase tracking-widest text-xs">Update
                    Cerita</button>
                <button type="button" onclick="confirmDelete({{ $post->id }})"
                    class="w-full py-4 bg-white border-2 border-red-50 text-red-400 rounded-2xl font-black uppercase text-[10px] tracking-widest hover:bg-red-50">Hapus
                    Cerita</button>
            </div>
        </div>

        <div class="lg:col-span-4">
            <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-gray-100 sticky top-6">
                <label class="text-[10px] font-black text-gray-400 uppercase block mb-4 text-center">Ubah
                    Thumbnail</label>
                <div class="aspect-video bg-gray-50 rounded-2xl overflow-hidden mb-4 border border-gray-100">
                    @if ($new_image)
                        <img src="{{ $new_image->temporaryUrl() }}" class="w-full h-full object-cover">
                    @else
                        <img src="{{ asset('storage/new/' . $post->image_url) }}" class="w-full h-full object-cover">
                    @endif
                </div>
                <label
                    class="text-center cursor-pointer block w-full py-4 bg-gray-900 text-white text-[10px] font-black uppercase rounded-2xl hover:bg-black transition tracking-widest">
                    Ubah Gambar
                    <input type="file" wire:model="new_image" class="hidden">
                </label>
                @error('new_image')
                    <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</div>
