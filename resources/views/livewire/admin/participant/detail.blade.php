<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8 min-h-screen">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div class="flex items-center gap-5">
            <a href="{{ route('dashboard') }}"
                class="group p-3 bg-white rounded-2xl shadow-sm border border-gray-100 hover:bg-amber-500 transition-all">
                <svg class="w-6 h-6 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-black text-gray-900 tracking-tight uppercase">Edit Partisipan</h1>
                <p class="text-sm text-gray-400">ID: #{{ $participant->id }} • Update Terakhir:
                    {{ $participant->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <button wire:click="save" wire:loading.attr="disabled"
                class="flex items-center justify-center gap-2 px-10 py-4 bg-amber-500 hover:bg-amber-600 text-white rounded-2xl font-black shadow-xl shadow-amber-200 transition-all active:scale-95 disabled:opacity-50">
                <span wire:loading.remove>SIMPAN PERUBAHAN</span>
                <span wire:loading>MEMPROSES...</span>
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        <div class="lg:col-span-4 space-y-6">
            <div class="bg-white p-8 rounded-[3rem] shadow-sm border border-gray-100 text-center">
                <div class="relative w-32 h-32 mx-auto mb-6">
                    <div
                        class="w-full h-full bg-amber-50 rounded-[2.5rem] flex items-center justify-center border-4 border-white shadow-lg overflow-hidden">
                        @if ($participant->profile_photo)
                            <img src="{{ asset('storage/' . $participant->profile_photo) }}"
                                class="w-full h-full object-cover">
                        @else
                            <span
                                class="text-5xl font-black text-amber-500 uppercase">{{ substr($participant->business_name, 0, 1) }}</span>
                        @endif
                    </div>
                </div>
                <h2 class="text-xl font-black text-gray-900 leading-tight mb-1">{{ $form['business_name'] }}</h2>
                <div
                    class="inline-block px-4 py-1 bg-amber-100 text-amber-600 text-[10px] font-black uppercase rounded-full tracking-widest mb-6">
                    {{ $form['business_field'] }}
                </div>

                <div class="p-4 bg-gray-50 rounded-3xl border border-gray-100 text-left">
                    <label class="text-[10px] font-black text-gray-400 uppercase ml-1">Status Publikasi</label>
                    <div class="flex items-center justify-between mt-1">
                        <span class="text-sm font-bold {{ $form['status'] ? 'text-green-600' : 'text-gray-400' }}">
                            {{ $form['status'] ? 'Aktif di Katalog' : 'Draft / Non-Aktif' }}
                        </span>
                        <button wire:click="$set('form.status', {{ !$form['status'] }})"
                            class="relative inline-flex h-6 w-11 items-center rounded-full transition {{ $form['status'] ? 'bg-amber-500' : 'bg-gray-200' }}">
                            <span
                                class="inline-block h-4 w-4 transform rounded-full bg-white transition {{ $form['status'] ? 'translate-x-6' : 'translate-x-1' }}"></span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-gray-900 p-8 rounded-[3rem] shadow-xl">
                <h3 class="text-white text-xs font-black uppercase tracking-widest mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 bg-amber-500 rounded-full"></span> Media Sosial & Web
                </h3>
                <div class="space-y-4">
                    @foreach (['ig' => 'Instagram', 'tiktok' => 'TikTok', 'fb' => 'Facebook', 'website' => 'Website URL', 'wa' => 'WhatsApp'] as $key => $label)
                        <div>
                            <label
                                class="text-[10px] text-gray-500 font-bold uppercase ml-1">{{ $label }}</label>
                            <input type="text" wire:model="form.{{ $key }}"
                                class="w-full mt-1 bg-gray-800 border-none rounded-xl text-white text-sm focus:ring-amber-500 placeholder-gray-600"
                                placeholder="Username/Link...">
                            @error('form.' . $key)
                                <span class="text-red-400 text-[9px] ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="lg:col-span-8 space-y-8">

            <div class="bg-white p-8 rounded-[3rem] shadow-sm border border-gray-100">
                <h3 class="text-amber-500 text-xs font-black uppercase tracking-widest mb-8 flex items-center gap-2">
                    <span class="w-8 h-px bg-amber-200"></span> Informasi Utama Bisnis
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Nama Bisnis</label>
                        <input type="text" wire:model="form.business_name"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500">
                        @error('form.business_name')
                            <span class="text-red-500 text-[10px] ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Nama Owner</label>
                        <input type="text" wire:model="form.owner_name"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Kontak / HP</label>
                        <input type="text" wire:model="form.contact"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div class="md:col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Deskripsi Singkat
                            Usaha</label>
                        <textarea wire:model="form.description" rows="4"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500"
                            placeholder="Jelaskan produk atau visi usaha..."></textarea>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[3rem] shadow-sm border border-gray-100">
                <h3 class="text-amber-500 text-xs font-black uppercase tracking-widest mb-8 flex items-center gap-2">
                    <span class="w-8 h-px bg-amber-200"></span> Lokasi & Alamat
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Provinsi</label>
                        <input type="text" wire:model="form.province"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Kota/Kabupaten</label>
                        <input type="text" wire:model="form.city"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Kecamatan</label>
                        <input type="text" wire:model="form.district"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Desa/Kelurahan</label>
                        <input type="text" wire:model="form.village"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Kode Pos</label>
                        <input type="text" wire:model="form.postal_code" maxlength="5"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div class="col-span-full">
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Detail Alamat</label>
                        <input type="text" wire:model="form.address_detail"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500"
                            placeholder="Jl. Nama Jalan, No Rumah, Blok, dll...">
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[3rem] shadow-sm border border-gray-100">
                <h3 class="text-amber-500 text-xs font-black uppercase tracking-widest mb-8 flex items-center gap-2">
                    <span class="w-8 h-px bg-amber-200"></span> Legalitas & Sertifikasi
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <p class="text-xs font-bold text-gray-900 border-l-4 border-amber-500 pl-3 uppercase">Legalitas
                            Usaha</p>
                        <div>
                            <label class="text-[10px] font-black text-gray-400 uppercase">Utama (Contoh: NIB)</label>
                            <input type="text" wire:model="form.legalitas"
                                class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl">
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-tighter">Legalitas
                                Lainnya</label>
                            <input type="text" wire:model="form.legalitas_other"
                                class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl shadow-inner">
                        </div>
                    </div>
                    <div class="space-y-4">
                        <p class="text-xs font-bold text-gray-900 border-l-4 border-amber-500 pl-3 uppercase">
                            Sertifikasi Produk</p>
                        <div>
                            <label class="text-[10px] font-black text-gray-400 uppercase">Utama (Halal/PIRT)</label>
                            <input type="text" wire:model="form.certification"
                                class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl">
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-tighter">Sertifikasi
                                Lainnya</label>
                            <input type="text" wire:model="form.certification_other"
                                class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl shadow-inner">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[3rem] shadow-sm border border-gray-100">
                <h3 class="text-amber-500 text-xs font-black uppercase tracking-widest mb-8 flex items-center gap-2">
                    <span class="w-8 h-px bg-amber-200"></span> Data Operasional
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Omset per Bulan</label>
                        <input type="text" wire:model="form.omset"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase ml-2">Jangkauan Pasar</label>
                        <select wire:model="form.market_reach"
                            class="w-full mt-1 px-5 py-3 bg-gray-50 border-none rounded-2xl text-sm">
                            <option value="Lokal">Lokal</option>
                            <option value="Nasional">Nasional</option>
                            <option value="Ekspor">Ekspor</option>
                        </select>
                    </div>
                </div>

                <div class="bg-amber-50 p-6 rounded-[2rem] border border-amber-100 space-y-6">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" wire:model.live="form.has_incubated" id="inc_check"
                            class="w-5 h-5 text-amber-500 rounded-lg focus:ring-amber-500 border-gray-300">
                        <label for="inc_check" class="text-xs font-black text-amber-900 uppercase">Pernah Mengikuti
                            Program Inkubasi?</label>
                    </div>

                    @if ($form['has_incubated'])
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 animate-fadeIn">
                            <div class="md:col-span-2">
                                <label class="text-[10px] font-black text-amber-800 uppercase ml-2">Lembaga
                                    Penyelenggara</label>
                                <input type="text" wire:model="form.incubation_institution"
                                    class="w-full mt-1 px-5 py-3 bg-white border-none rounded-2xl shadow-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black text-amber-800 uppercase ml-2">Tgl Mulai</label>
                                <input type="date" wire:model="form.incubation_start"
                                    class="w-full mt-1 px-5 py-3 bg-white border-none rounded-2xl shadow-sm text-sm">
                            </div>
                            <div>
                                <label class="text-[10px] font-black text-amber-800 uppercase ml-2">Tgl Selesai</label>
                                <input type="date" wire:model="form.incubation_end"
                                    class="w-full mt-1 px-5 py-3 bg-white border-none rounded-2xl shadow-sm text-sm">
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="bg-gray-100 p-8 rounded-[3rem] border border-gray-200">
                <h3 class="text-gray-500 text-xs font-black uppercase tracking-widest mb-6">Berkas Profil Bisnis</h3>
                <div class="flex flex-col md:flex-row items-center justify-between gap-4 p-6 bg-white rounded-[2rem]">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-amber-100 rounded-2xl">
                            <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-900">Dokumen Profil Bisnis (PDF)</p>
                            <p class="text-[10px] text-gray-400">Path:
                                {{ $participant->business_profile_file ?? 'Belum diunggah' }}</p>
                        </div>
                    </div>
                    @if ($participant->business_profile_file)
                        <a href="{{ asset('storage/participant/' . $participant->business_profile_file) }}"
                            target="_blank"
                            class="px-6 py-3 bg-gray-900 text-white text-[10px] font-black uppercase rounded-xl hover:bg-black transition">
                            Buka Dokumen
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
