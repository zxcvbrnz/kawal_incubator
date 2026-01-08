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
            <h1 class="text-3xl font-black text-gray-900 tracking-tight uppercase">Tambah Berita</h1>
            <p class="text-sm text-gray-400">Tuliskan artikel atau kisah baru</p>
        </div>
    </div>

    <form wire:submit.prevent="save" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <div class="lg:col-span-8 space-y-6">
            <div class="bg-white p-8 rounded-[3rem] shadow-sm border border-gray-100">
                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between items-end px-2">
                            <label class="text-[10px] font-black text-gray-400 uppercase">Judul Berita</label>
                            {{-- Info Tambahan untuk Slug --}}
                            <span class="text-[9px] font-bold text-amber-600 uppercase tracking-tight">
                                * Hindari simbol seperti / , ? , # , & , " untuk keamanan link
                            </span>
                        </div>
                        <input type="text" wire:model="title"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-bold">
                        @error('title')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Isi Berita</label>
                        <textarea wire:model="content" rows="10"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500"></textarea>
                        @error('content')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit"
                class="w-full py-4 bg-amber-500 text-white rounded-2xl font-black shadow-xl shadow-amber-200 uppercase tracking-widest text-xs">Publikasikan
                Berita</button>
        </div>

        <div class="lg:col-span-4">
            <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-gray-100 sticky top-6">
                <label class="text-[10px] font-black text-gray-400 uppercase block mb-4 text-center">Thumbnail</label>
                <div
                    class="aspect-video bg-gray-50 rounded-2xl overflow-hidden mb-4 border-2 border-dashed border-gray-100 flex items-center justify-center">
                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-cover">
                    @else
                        <svg class="w-12 h-12 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    @endif
                </div>
                <label
                    class="text-center cursor-pointer block w-full py-4 bg-gray-900 text-white text-[10px] font-black uppercase rounded-2xl hover:bg-black transition tracking-widest">
                    Pilih Gambar
                    <input type="file" wire:model="image" class="hidden">
                </label>
                @error('image')
                    <p class="text-red-500 text-[10px] mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </form>
</div>
