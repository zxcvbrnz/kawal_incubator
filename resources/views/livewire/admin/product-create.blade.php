<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="flex items-center gap-5 mb-10">
        <a wire:navigate href="{{ route('admin.product') }}"
            class="group p-3 bg-white rounded-2xl shadow-sm border border-gray-100 hover:bg-amber-500 transition-all">
            <svg class="w-6 h-6 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-3xl font-black text-gray-900 tracking-tight uppercase">Tambah Produk</h1>
            <p class="text-sm text-gray-400">Tambahkan Produk baru</p>
        </div>
    </div>
    <form wire:submit="save" class="space-y-6">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <div class="space-y-4">
                <div>
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Pilih Partisipan</label>
                    <select wire:model="participant_id"
                        class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500">
                        <option value="">-- Pilih Pemilik Bisnis --</option>
                        @foreach (\App\Models\Participant::all() as $p)
                            <option value="{{ $p->id }}">{{ $p->business_name }} ({{ $p->owner_name }})</option>
                        @endforeach
                    </select>
                    @error('participant_id')
                        <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Nama Produk</label>
                    <input type="text" wire:model="name"
                        class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500">
                    @error('name')
                        <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Foto Produk</label>
                    <input type="file" wire:model="image" class="w-full mt-1">
                    @error('image')
                        <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center gap-3 p-4 bg-amber-50 rounded-2xl">
                    <input type="checkbox" wire:model="display" id="disp"
                        class="w-5 h-5 text-amber-500 rounded border-gray-300">
                    <label for="disp" class="text-xs font-black text-amber-900 uppercase">Tampilkan di
                        Katalog</label>
                </div>
            </div>
        </div>

        <button type="submit"
            class="w-full py-4 bg-amber-500 text-white rounded-2xl font-black shadow-xl shadow-amber-200">SIMPAN
            PRODUK</button>
    </form>
</div>
