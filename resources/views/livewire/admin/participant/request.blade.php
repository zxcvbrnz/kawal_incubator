<div class="p-6 space-y-8 max-w-7xl mx-auto">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tight">Manajemen Partisipan</h2>
        <div class="relative group w-full md:w-72">
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari bisnis..."
                class="w-full pl-12 pr-6 py-3 bg-white border border-gray-100 rounded-2xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all font-bold text-sm shadow-sm">
            <div class="absolute left-4 top-3.5 text-gray-300 group-focus-within:text-amber-500 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    {{-- Section: Permintaan Bergabung --}}
    <div class="bg-amber-50 rounded-2xl p-6 border border-amber-100">
        <h3 class="text-amber-800 font-bold mb-4 flex items-center gap-2 uppercase text-xs tracking-widest">
            <span class="relative flex h-3 w-3">
                <span
                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-amber-500"></span>
            </span>
            Permintaan Bergabung ({{ $requests->count() }})
        </h3>

        @if ($requests->isEmpty())
            <p class="text-amber-600 text-[10px] font-black uppercase tracking-widest italic opacity-60">Tidak ada
                permintaan pendaftaran baru.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($requests as $req)
                    <div
                        class="bg-white p-4 rounded-xl shadow-sm border border-amber-200 flex flex-col justify-between">
                        <div>
                            <h4 class="font-black text-gray-900 uppercase text-sm">{{ $req->business_name }}</h4>
                            <p class="text-[10px] font-bold text-gray-400 uppercase">Owner: {{ $req->owner_name }}</p>
                            <p class="text-[10px] font-black text-amber-600 mt-1 uppercase tracking-widest">
                                {{ $req->business_field }}</p>
                        </div>
                        <div class="flex gap-2 mt-4">
                            <button wire:click="approve({{ $req->id }})"
                                class="flex-1 bg-amber-500 hover:bg-amber-600 text-white text-[10px] font-black py-2 rounded-lg transition uppercase tracking-widest">
                                TERIMA
                            </button>
                            <button onclick="confirmDelete({{ $req->id }}, '{{ $req->business_name }}')"
                                class="bg-white border border-red-100 text-red-400 hover:bg-red-50 text-[10px] font-black py-2 px-3 rounded-lg transition uppercase tracking-widest">
                                TOLAK
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Section: Partisipan Aktif (Table with Empty State) --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-50 flex justify-between items-center">
            <h3 class="font-black text-gray-800 uppercase text-sm tracking-widest">Partisipan Aktif</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 text-gray-400 uppercase text-[10px] tracking-widest">
                    <tr>
                        <th class="px-6 py-5">Bisnis</th>
                        <th class="px-6 py-4">Pemilik</th>
                        <th class="px-6 py-4">Kota</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse ($participants as $p)
                        <tr wire:key="participant-{{ $p->id }}" class="hover:bg-amber-50/20 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-black text-gray-900 uppercase text-xs tracking-tight">
                                    {{ $p->business_name }}</div>
                                <div class="text-[9px] font-bold text-amber-600 uppercase tracking-widest">
                                    {{ $p->business_field }}</div>
                            </td>
                            <td class="px-6 py-4 text-gray-600 font-medium uppercase text-[11px]">{{ $p->owner_name }}
                            </td>
                            <td class="px-6 py-4 text-gray-600 font-medium uppercase text-[11px]">{{ $p->city }}
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest {{ $p->display ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-400' }}">
                                    {{ $p->display ? 'Ditampilkan' : 'Draft' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a wire:navigate href="{{ route('admin.participant.detail', $p->id) }}"
                                    class="inline-block p-2 text-amber-500 hover:bg-amber-50 rounded-xl transition duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center">
                                    <p class="text-gray-400 font-black uppercase tracking-[0.2em] italic text-xs">
                                        {{ $search ? 'Partisipan tidak ditemukan untuk "' . $search . '"' : 'Belum ada partisipan aktif' }}
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($participants->isNotEmpty())
            <div class="p-6 border-t border-gray-50">
                {{ $participants->links('vendor.pagination.custom-amber') }}
            </div>
        @endif
    </div>
</div>
