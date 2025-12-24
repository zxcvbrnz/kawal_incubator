<div class="min-h-screen py-12">
    <div class="max-w-4xl mx-auto">
        <div class="mb-10 text-center">
            <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight">
                Pendaftaran <span class="text-amber-500">Kawal Incubator</span>
            </h1>
            <p class="text-gray-500 mt-2 text-sm italic">Lengkapi seluruh data usaha Anda di bawah ini.</p>
        </div>

        <form wire:submit.prevent="save" class="space-y-6">

            <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-md border border-gray-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="h-6 w-1 bg-amber-500 rounded-full"></div>
                    <h2 class="text-sm font-black text-gray-900 uppercase tracking-widest">Identitas Utama</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label
                            class="required block text-[10px] font-black uppercase text-gray-400 mb-1 tracking-widest">Nama
                            Usaha</label>
                        <input type="text" wire:model="business_name"
                            class="w-full bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500">
                        @error('business_name')
                            <span class="text-[10px] text-red-500 font-bold uppercase">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label
                            class="required block text-[10px] font-black uppercase text-gray-400 mb-1 tracking-widest">Nama
                            Pemilik</label>
                        <input type="text" wire:model="owner_name"
                            class="w-full bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500">
                        @error('owner_name')
                            <span class="text-[10px] text-red-500 font-bold uppercase">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label
                            class="required block text-[10px] font-black uppercase text-gray-400 mb-1 tracking-widest">Kontak
                            Pemilik</label>
                        <input type="text" wire:model="contact" placeholder="Contoh: 08123456789"
                            class="w-full bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500">
                        @error('contact')
                            <span class="text-[10px] text-red-500 font-bold uppercase">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label
                            class="required block text-[10px] font-black uppercase text-gray-400 mb-1 tracking-widest">Bidang
                            Usaha</label>
                        <input type="text" wire:model="business_field"
                            class="w-full bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500">
                        @error('business_field')
                            <span class="text-[10px] text-red-500 font-bold uppercase">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-md border border-gray-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="h-6 w-1 bg-amber-500 rounded-full"></div>
                    <h2 class="text-sm font-black text-gray-900 uppercase tracking-widest">Alamat Lengkap</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1">
                        <label class="required text-[10px] font-bold text-gray-400 uppercase ml-2">Provinsi</label>
                        <select wire:model.live="province_id"
                            class="bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500 text-sm">
                            <option value="">Pilih Provinsi</option>
                            @foreach ($provinceList as $p)
                                <option value="{{ $p['id'] }}">{{ $p['name'] }}</option>
                            @endforeach
                        </select>
                        @error('province_id')
                            <span class="text-[10px] text-red-500 font-bold uppercase ml-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1">
                        <label
                            class="required text-[10px] font-bold text-gray-400 uppercase ml-2">Kota/Kabupaten</label>
                        <select wire:model.live="city_id" {{ empty($cityList) ? 'disabled' : '' }}
                            class="bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500 text-sm disabled:opacity-50">
                            <option value="">Pilih Kota/Kabupaten</option>
                            @foreach ($cityList as $city)
                                <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <span class="text-[10px] text-red-500 font-bold uppercase ml-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1">
                        <label class="required text-[10px] font-bold text-gray-400 uppercase ml-2">Kecamatan</label>
                        <select wire:model.live="district_id" {{ empty($districtList) ? 'disabled' : '' }}
                            class="bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500 text-sm disabled:opacity-50">
                            <option value="">Pilih Kecamatan</option>
                            @foreach ($districtList as $district)
                                <option value="{{ $district['id'] }}">{{ $district['name'] }}</option>
                            @endforeach
                        </select>
                        @error('district_id')
                            <span class="text-[10px] text-red-500 font-bold uppercase ml-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1">
                        <label class="required text-[10px] font-bold text-gray-400 uppercase ml-2">Kelurahan</label>
                        <select wire:model.live="village_id" {{ empty($villageList) ? 'disabled' : '' }}
                            class="bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500 text-sm disabled:opacity-50">
                            <option value="">Pilih Kelurahan</option>
                            @foreach ($villageList as $village)
                                <option value="{{ $village['id'] }}">{{ $village['name'] }}</option>
                            @endforeach
                        </select>
                        @error('village_id')
                            <span class="text-[10px] text-red-500 font-bold uppercase ml-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="md:col-span-2 flex flex-col gap-1">
                        <label class="required text-[10px] font-bold text-gray-400 uppercase ml-2">Nama Jalan, No. Rumah
                            / Gedung</label>
                        <textarea wire:model="address_detail" rows="2" placeholder="Contoh: Jl. Merdeka No. 123, RT 01/RW 02"
                            class="bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500 text-sm px-4 py-3"></textarea>
                        @error('address_detail')
                            <span class="text-[10px] text-red-500 font-bold uppercase ml-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="md:col-span-2 flex flex-col gap-1">
                        <label class="required text-[10px] font-bold text-gray-400 uppercase ml-2">Kodepos</label>
                        <input type="text" wire:model="postal_code" placeholder="Masukkan Kodepos"
                            class="bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500 text-sm">
                        @error('postal_code')
                            <span class="text-[10px] text-red-500 font-bold uppercase ml-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-md border border-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label
                            class="required block text-[10px] font-black uppercase text-gray-400 mb-1 tracking-widest">Omset
                            per Bulan</label>
                        <select wire:model="omset"
                            class="w-full bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500">
                            <option value="">Pilih Range Omset</option>
                            <option value="A">0 - 15.000.000 / bulan</option>
                            <option value="B">15.000.001 - 50.000.000 / bulan</option>
                            <option value="C">50.000.001 - 100.000.000 / bulan</option>
                            <option value="D">100.000.001 +++</option>
                        </select>
                        @error('omset')
                            <span class="text-[10px] text-red-500 font-bold uppercase">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label
                            class="required block text-[10px] font-black uppercase text-gray-400 mb-1 tracking-widest">Jangkauan
                            Pasar</label>
                        <select wire:model="market_reach"
                            class="w-full bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500">
                            <option value="">Pilih Jangkauan</option>
                            <option value="Lokal">Lokal</option>
                            <option value="Nasional">Nasional</option>
                            <option value="Internasional">Internasional</option>
                        </select>
                        @error('market_reach')
                            <span class="text-[10px] text-red-500 font-bold uppercase">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-md border border-gray-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="h-6 w-1 bg-amber-500 rounded-full"></div>
                    <h2 class="text-sm font-black text-gray-900 uppercase tracking-widest">Media Promosi</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="relative">
                        <span
                            class="absolute inset-y-0 left-4 flex items-center text-gray-400 text-xs font-bold">IG</span>
                        <input type="text" wire:model="ig" placeholder="Username Instagram"
                            class="pl-12 w-full bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div class="relative">
                        <span
                            class="absolute inset-y-0 left-4 flex items-center text-gray-400 text-xs font-bold">TT</span>
                        <input type="text" wire:model="tiktok" placeholder="Username Tiktok"
                            class="pl-12 w-full bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div class="relative">
                        <span
                            class="absolute inset-y-0 left-4 flex items-center text-gray-400 text-xs font-bold">FB</span>
                        <input type="text" wire:model="fb" placeholder="Nama Facebook"
                            class="pl-12 w-full bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div class="relative">
                        <span
                            class="absolute inset-y-0 left-4 flex items-center text-gray-400 text-xs font-bold">WEB</span>
                        <input type="text" wire:model="website" placeholder="www.website.com"
                            class="pl-12 w-full bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div class="md:col-span-2 relative">
                        <span
                            class="absolute inset-y-0 left-4 flex items-center text-gray-400 text-xs font-bold">WA</span>
                        <input type="text" wire:model="wa" placeholder="Whatsapp Bisnis"
                            class="pl-12 w-full bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500">
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-md border border-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label
                            class="required block text-[10px] font-black uppercase text-gray-400 mb-2 tracking-widest">Legalitas
                            Usaha</label>
                        <select wire:model.live="legalitas"
                            class="w-full bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500">
                            <option value="">Pilih Legalitas</option>
                            <option value="NIB">NIB</option>
                            <option value="PIRT">PIRT</option>
                            <option value="CV">CV</option>
                            <option value="PT">PT</option>
                            <option value="UD">UD</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        @error('legalitas')
                            <span class="text-[10px] text-red-500 font-bold uppercase">{{ $message }}</span>
                        @enderror
                        @if ($legalitas == 'Lainnya')
                            <input type="text" wire:model="legalitas_other" placeholder="Sebutkan..."
                                class="mt-2 w-full bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500 text-sm">
                            @error('legalitas_other')
                                <span class="text-[10px] text-red-500 font-bold uppercase">{{ $message }}</span>
                            @enderror
                        @endif
                    </div>
                    <div>
                        <label
                            class="required block text-[10px] font-black uppercase text-gray-400 mb-2 tracking-widest">Sertifikasi</label>
                        <select wire:model.live="certification"
                            class="w-full bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500">
                            <option value="">Pilih Sertifikasi</option>
                            <option value="Halal">Halal</option>
                            <option value="BPOM">BPOM</option>
                            <option value="HKI">HKI</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        @error('certification')
                            <span class="text-[10px] text-red-500 font-bold uppercase">{{ $message }}</span>
                        @enderror
                        @if ($certification == 'Lainnya')
                            <input type="text" wire:model="certification_other" placeholder="Sebutkan..."
                                class="mt-2 w-full bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500 text-sm">
                            @error('certification_other')
                                <span class="text-[10px] text-red-500 font-bold uppercase">{{ $message }}</span>
                            @enderror
                        @endif
                    </div>
                </div>
            </div>

            <div class="bg-gray-900 text-white p-6 md:p-8 rounded-[2rem] shadow-lg">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="required text-xs font-black uppercase tracking-widest">Pernah Ikut Inkubasi?</h2>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" wire:model.live="has_incubated" value="1"
                                class="text-amber-500 focus:ring-amber-500"> <span class="text-xs font-bold">Ya</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" wire:model.live="has_incubated" value="0"
                                class="text-amber-500 focus:ring-amber-500"> <span
                                class="text-xs font-bold">Tidak</span>
                        </label>
                    </div>
                </div>
                @error('has_incubated')
                    <span class="text-[10px] text-red-400 font-bold uppercase mb-4 block">{{ $message }}</span>
                @enderror

                @if ($has_incubated == '1')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4 border-t border-gray-800 animate-fade-in">
                        <div class="md:col-span-2">
                            <label class="required text-[9px] uppercase text-gray-500 font-bold mb-1">Lembaga /
                                Instansi Apa?</label>
                            <input type="text" wire:model="incubation_institution"
                                class="w-full bg-gray-800 border-none rounded-xl focus:ring-2 focus:ring-amber-500">
                            @error('incubation_institution')
                                <span class="text-[10px] text-red-400 font-bold uppercase">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="required text-[9px] uppercase text-gray-500 font-bold mb-1">Tanggal
                                Inkubasi</label>
                            <input type="date" wire:model="incubation_start"
                                class="w-full bg-gray-800 border-none rounded-xl focus:ring-2 focus:ring-amber-500 text-xs">
                            @error('incubation_start')
                                <span class="text-[10px] text-red-400 font-bold uppercase">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="required text-[9px] uppercase text-gray-500 font-bold mb-1">Tanggal
                                Lulus</label>
                            <input type="date" wire:model="incubation_end"
                                class="w-full bg-gray-800 border-none rounded-xl focus:ring-2 focus:ring-amber-500 text-xs">
                            @error('incubation_end')
                                <span class="text-[10px] text-red-400 font-bold uppercase">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endif
            </div>

            <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-md border border-gray-100">
                <div class="space-y-6">
                    <div>
                        <label
                            class="block text-[10px] font-black uppercase text-gray-400 mb-2 tracking-widest">Deskripsi
                            Usaha</label>
                        <textarea wire:model="description" rows="4" placeholder="Ceritakan singkat mengenai bisnis Anda..."
                            class="w-full bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-amber-500 placeholder:text-gray-300"></textarea>
                        @error('description')
                            <span class="text-[10px] text-red-500 mt-1 font-bold uppercase">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="relative group">
                            <div
                                class="bg-white p-6 rounded-[2rem] border-2 border-dashed border-gray-200 hover:border-amber-300 transition-all flex flex-col items-center justify-center">
                                <div
                                    class="block text-[10px] font-black uppercase text-gray-400 mb-4 tracking-widest text-center">
                                    Foto Profil</div>
                                <div class="mb-4 relative">
                                    <div
                                        class="w-24 h-24 rounded-2xl bg-gray-50 border border-gray-100 overflow-hidden flex items-center justify-center shadow-inner">
                                        @if ($profile_photo)
                                            <img src="{{ $profile_photo->temporaryUrl() }}"
                                                class="w-full h-full object-cover">
                                        @else
                                            <svg class="w-10 h-10 text-gray-200" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        @endif
                                    </div>
                                    <div wire:loading wire:target="profile_photo"
                                        class="absolute inset-0 bg-white/60 flex items-center justify-center rounded-2xl">
                                        <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-amber-500">
                                        </div>
                                    </div>
                                </div>
                                <input id="profile_photo" type="file" wire:model="profile_photo" accept="image/*"
                                    class="hidden">
                                <label for="profile_photo"
                                    class="px-4 py-2 bg-amber-50 text-amber-700 text-[10px] font-black uppercase rounded-full cursor-pointer hover:bg-amber-100 transition-colors">
                                    {{ $profile_photo ? 'Change Photo' : 'Choose Photo' }}
                                </label>
                                @error('profile_photo')
                                    <span
                                        class="text-[10px] text-red-500 mt-2 font-bold uppercase">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="relative group">
                            <div
                                class="bg-white p-6 rounded-[2rem] border-2 border-dashed border-gray-200 hover:border-amber-300 transition-all flex flex-col items-center justify-center">
                                <div
                                    class="block text-[10px] font-black uppercase text-gray-400 mb-4 tracking-widest text-center">
                                    Profil Usaha (PDF)</div>
                                <div class="mb-4 relative">
                                    <div
                                        class="w-24 h-24 rounded-2xl bg-gray-50 border border-gray-100 flex flex-col items-center justify-center shadow-inner overflow-hidden">
                                        @if ($business_profile_file)
                                            <svg class="w-10 h-10 text-amber-500" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span
                                                class="text-[8px] font-black text-amber-600 uppercase mt-1 px-2 text-center truncate w-full">
                                                {{ $business_profile_file->getClientOriginalName() }}
                                            </span>
                                        @else
                                            <svg class="w-10 h-10 text-gray-200" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                        @endif
                                    </div>
                                    <div wire:loading wire:target="business_profile_file"
                                        class="absolute inset-0 bg-white/60 flex items-center justify-center rounded-2xl">
                                        <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-amber-500">
                                        </div>
                                    </div>
                                </div>
                                <input id="business_profile_file" type="file" wire:model="business_profile_file"
                                    accept="application/pdf" class="hidden">
                                <label for="business_profile_file"
                                    class="px-4 py-2 bg-amber-50 text-amber-700 text-[10px] font-black uppercase rounded-full cursor-pointer hover:bg-amber-100 transition-colors">
                                    {{ $business_profile_file ? 'Change File' : 'Choose File' }}
                                </label>
                                @error('business_profile_file')
                                    <span
                                        class="text-[10px] text-red-500 mt-2 font-bold uppercase">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 md:p-8 rounded-[2rem] border border-gray-100 flex flex-col items-center gap-4">
                <label
                    class="block text-[10px] font-black uppercase text-gray-400 tracking-widest text-center">Verifikasi
                    Keamanan</label>

                <div class="flex items-center gap-3 bg-gray-50 p-3 rounded-2xl border border-gray-100 shadow-inner">
                    @if ($captcha_image)
                        <img src="{{ $captcha_image }}" alt="Captcha" class="rounded-lg h-10 select-none">
                    @endif

                    <button type="button" wire:click="generateCaptcha"
                        class="p-2 text-amber-500 hover:bg-amber-100 rounded-xl transition-all active:scale-95">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                            </path>
                        </svg>
                    </button>
                </div>
                <input type="text" wire:model="captcha_code" placeholder="Ketik kode di atas"
                    class="w-full max-w-[200px] text-center bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-amber-500 uppercase font-black tracking-[0.2em] placeholder:tracking-normal placeholder:font-normal">
            </div>

            <button type="submit" wire:loading.attr="disabled"
                class="w-full bg-amber-500 hover:bg-amber-600 text-white font-black py-5 rounded-[2rem] transition-all uppercase tracking-widest shadow-xl shadow-amber-200">
                <span wire:loading.remove wire:target="save">Simpan Data Pendaftaran</span>
                <span wire:loading wire:target="save">Memproses...</span>
            </button>
        </form>
    </div>
</div>
