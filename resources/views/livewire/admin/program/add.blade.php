<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="flex items-center gap-5 mb-10">
        <a wire:navigate href="{{ route('admin.program') }}"
            class="group p-3 bg-white rounded-2xl shadow-sm border border-gray-100 hover:bg-amber-500 transition-all">
            <svg class="w-6 h-6 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight uppercase">Tambah Program</h1>
            <p class="text-sm text-gray-400">Buat program inkubasi baru</p>
        </div>
    </div>

    <form wire:submit="save" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <div class="lg:col-span-8 space-y-6">
            <div class="bg-white p-8 rounded-[3rem] shadow-sm border border-gray-100">
                <div class="space-y-6">
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Nama Program</label>
                        <input type="text" wire:model="name"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-bold">
                        @error('name')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Deskripsi Program</label>
                        <textarea wire:model="description" rows="6"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500"></textarea>
                        @error('description')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit"
                class="w-full py-4 bg-amber-500 text-white rounded-2xl font-black shadow-xl shadow-amber-200 uppercase text-xs tracking-widest">Tambahkan
                Program</button>
        </div>

        <div class="lg:col-span-4">
            <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-gray-100 text-center sticky top-6">
                <label class="text-[10px] font-black text-gray-400 uppercase block mb-4">Preview Banner</label>
                <div
                    class="aspect-video bg-gray-50 rounded-2xl overflow-hidden border-4 border-white shadow-md flex items-center justify-center">
                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-cover">
                    @else
                        <p class="text-[10px] font-black text-gray-300 uppercase italic">Pilih Banner</p>
                    @endif
                </div>
                <label
                    class="cursor-pointer block w-full mt-3 py-4 bg-gray-900 text-white text-[10px] font-black uppercase rounded-2xl hover:bg-black transition tracking-widest">
                    Pilih Banner
                    <input type="file" wire:model="image" class="hidden">
                </label>
                @error('image')
                    <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </form>
</div>
