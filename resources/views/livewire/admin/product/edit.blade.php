<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8 min-h-screen">
    {{-- Header --}}
    <div class="flex items-center gap-5 mb-10">
        <a wire:navigate href="{{ route('admin.product') }}"
            class="group p-3 bg-white rounded-2xl shadow-sm border border-gray-100 hover:bg-amber-500 transition-all">
            <svg class="w-6 h-6 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight uppercase">Edit Produk</h1>
            <p class="text-sm text-gray-400">ID Produk: #{{ $product->id }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        {{-- Preview Gambar --}}
        <div class="lg:col-span-4">
            <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-gray-100 text-center">
                <label class="text-[10px] font-black text-gray-400 uppercase block mb-4">Gambar Saat Ini</label>
                <div class="relative group">
                    <div
                        class="w-full aspect-square bg-gray-50 rounded-[2rem] overflow-hidden border-4 border-white shadow-md">
                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-cover">
                            <div
                                class="absolute inset-0 bg-amber-500/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="text-white text-[10px] font-black uppercase">Preview Baru</span>
                            </div>
                        @else
                            <img src="{{ asset('storage/product/' . $old_image) }}" class="w-full h-full object-cover">
                        @endif
                    </div>
                </div>
                <div class="mt-6">
                    <label
                        class="cursor-pointer inline-block px-6 py-3 bg-gray-900 text-white text-[10px] font-black uppercase rounded-xl hover:bg-black transition">
                        Ganti Foto
                        <input type="file" wire:model="image" class="hidden">
                    </label>
                    @error('image')
                        <p class="text-red-500 text-[10px] mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Form Edit --}}
        <div class="lg:col-span-8 space-y-6">
            <div class="bg-white p-8 rounded-[3rem] shadow-sm border border-gray-100">
                <div class="space-y-6">
                    {{-- Nama Produk --}}
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Nama Produk</label>
                        <input type="text" wire:model="name"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-bold text-gray-700">
                        @error('name')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Dropdown Partisipan --}}
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Pemilik Bisnis
                            (Partisipan)</label>
                        <select wire:model="participant_id"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 font-bold text-gray-700">
                            <option value="">-- Pilih Partisipan --</option>
                            @foreach ($participants as $p)
                                <option value="{{ $p->id }}">{{ $p->business_name }} ({{ $p->owner_name }})
                                </option>
                            @endforeach
                        </select>
                        @error('participant_id')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Toggle Display --}}
                    <div class="p-4 bg-amber-50 rounded-2xl border border-amber-100 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-black text-amber-900 uppercase">Status Publikasi</p>
                            <p class="text-[10px] text-amber-600 uppercase tracking-tighter">Tampilkan produk ini di
                                halaman depan?</p>
                        </div>
                        <button type="button" wire:click="$toggle('display')"
                            class="relative inline-flex h-6 w-11 items-center rounded-full transition {{ $display ? 'bg-amber-500' : 'bg-gray-300' }}">
                            <span
                                class="inline-block h-4 w-4 transform rounded-full bg-white transition {{ $display ? 'translate-x-6' : 'translate-x-1' }}"></span>
                        </button>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="mt-10 pt-6 border-t border-gray-50 space-y-4">
                    <button wire:click="update" wire:loading.attr="disabled"
                        class="w-full flex items-center justify-center gap-2 py-4 bg-amber-500 hover:bg-amber-600 text-white rounded-2xl font-black shadow-xl shadow-amber-200 transition-all active:scale-95 disabled:opacity-50">
                        <span wire:loading.remove>SIMPAN PERUBAHAN</span>
                        <span wire:loading>MENYIMPAN...</span>
                    </button>

                    <button wire:click="delete"
                        wire:confirm="PERHATIAN! Produk ini akan dihapus secara permanen. Lanjutkan?"
                        class="w-full py-4 bg-white border-2 border-red-50 text-red-400 rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] hover:bg-red-50 hover:border-red-100 transition-all">
                        Hapus Produk Selamanya
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
