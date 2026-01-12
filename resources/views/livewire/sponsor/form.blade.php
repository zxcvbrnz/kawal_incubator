<div class="max-w-7xl">
    <p class="text-[11px] font-black uppercase tracking-[0.2em] text-amber-600 mb-6">
        Kami menerima kerjasama dengan bentuk sponsorship, silahkan isi form berikut ini:
    </p>

    @if (session()->has('success'))
        <div class="mb-8 p-4 bg-green-50 border border-green-200 rounded-2xl flex items-center gap-3">
            <div class="p-2 bg-green-500 rounded-full text-white">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <span class="text-sm font-bold text-green-800 uppercase tracking-tight">{{ session('success') }}</span>
        </div>
    @endif

    <form wire:submit.prevent="save"
        class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white p-8 md:p-10 rounded-[2rem] border border-gray-100 shadow-xl shadow-gray-200/50">

        {{-- Nama Instansi --}}
        <div class="space-y-2">
            <label class="required block text-[10px] font-black uppercase text-gray-400 tracking-widest">Nama Instansi /
                Perusahaan</label>
            <input type="text" wire:model="name" placeholder="PT. Inovasi Bangsa"
                class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 transition-all placeholder:text-gray-300 text-sm font-semibold">
            @error('name')
                <span class="text-[9px] text-red-500 font-bold uppercase">{{ $message }}</span>
            @enderror
        </div>

        {{-- Kontak/WA --}}
        <div class="space-y-2">
            <label class="required block text-[10px] font-black uppercase text-gray-400 tracking-widest">Nomor
                WhatsApp</label>
            <input type="number" wire:model="contact" placeholder="08123456789"
                class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 transition-all placeholder:text-gray-300 text-sm font-semibold">
            @error('contact')
                <span class="text-[9px] text-red-500 font-bold uppercase">{{ $message }}</span>
            @enderror
        </div>

        {{-- Email --}}
        <div class="space-y-2">
            <label class="required block text-[10px] font-black uppercase text-gray-400 tracking-widest">Email
                Resmi</label>
            <input type="email" wire:model="email" placeholder="partnership@bisnis.com"
                class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 transition-all placeholder:text-gray-300 text-sm font-semibold">
            @error('email')
                <span class="text-[9px] text-red-500 font-bold uppercase">{{ $message }}</span>
            @enderror
        </div>

        {{-- Upload Proposal --}}
        <div class="space-y-2">
            <label class="block text-[10px] font-black uppercase text-gray-400 tracking-widest">Proposal (Opsional -
                PDF/DOC)</label>
            <div class="relative">
                <input type="file" wire:model="proposal_file"
                    class="block w-full text-[10px] text-gray-400 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-amber-100 file:text-amber-700 hover:file:bg-amber-200 cursor-pointer">
                <div wire:loading wire:target="proposal_file" class="mt-2 flex items-center gap-2">
                    <div class="w-3 h-3 border-2 border-amber-500 border-t-transparent rounded-full animate-spin"></div>
                    <span class="text-[9px] font-black text-amber-600 uppercase">Mengunggah...</span>
                </div>
            </div>
            @error('proposal_file')
                <span class="text-[9px] text-red-500 font-bold uppercase">{{ $message }}</span>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div class="md:col-span-2 space-y-2">
            <label class="required block text-[10px] font-black uppercase text-gray-400 tracking-widest">Bentuk
                Kerjasama yang
                Ditawarkan</label>
            <textarea wire:model="description" rows="4" placeholder="Jelaskan secara singkat rencana kolaborasi Anda..."
                class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 transition-all placeholder:text-gray-300 text-sm font-semibold"></textarea>
            @error('description')
                <span class="text-[9px] text-red-500 font-bold uppercase">{{ $message }}</span>
            @enderror
        </div>

        {{-- Submit Button --}}
        <div class="md:col-span-2 pt-4">
            <button type="submit" wire:loading.attr="disabled"
                class="inline-flex items-center justify-center gap-3 w-full md:w-auto px-12 py-4 bg-gray-900 text-white text-[11px] font-black uppercase tracking-[0.2em] rounded-2xl hover:bg-amber-500 hover:shadow-xl hover:shadow-amber-200 transition-all duration-300 disabled:opacity-50 min-h-[56px]">

                {{-- Teks Normal --}}
                <span wire:loading.remove wire:target="save">
                    Kirim Penawaran Kerjasama
                </span>

                {{-- State Loading --}}
                <svg wire:loading wire:target="save" class="animate-spin h-6 w-6 text-white" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                <span wire:loading wire:target="save">
                    Sedang Mengirim...
                </span>

            </button>
        </div>
    </form>
</div>
