<div class="p-6 space-y-8 max-w-7xl mx-auto">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Manajemen Partisipan</h2>
        <input type="text" wire:model.live="search" placeholder="Cari nama bisnis..."
            class="rounded-xl border-gray-200 focus:ring-amber-500 text-sm w-64">
    </div>

    <div class="bg-amber-50 rounded-2xl p-6 border border-amber-100">
        <h3 class="text-amber-800 font-bold mb-4 flex items-center gap-2">
            <span class="relative flex h-3 w-3">
                <span
                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-amber-500"></span>
            </span>
            Permintaan Bergabung ({{ $requests->count() }})
        </h3>

        @if ($requests->isEmpty())
            <p class="text-amber-600 text-sm italic">Tidak ada permintaan pendaftaran baru.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($requests as $req)
                    <div
                        class="bg-white p-4 rounded-xl shadow-sm border border-amber-200 flex flex-col justify-between">
                        <div>
                            <h4 class="font-bold text-gray-900">{{ $req->business_name }}</h4>
                            <p class="text-xs text-gray-500">Owner: {{ $req->owner_name }}</p>
                            <p class="text-xs text-amber-600 mt-1">{{ $req->business_field }}</p>
                        </div>
                        <div class="flex gap-2 mt-4">
                            <button wire:click="approve({{ $req->id }})"
                                class="flex-1 bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold py-2 rounded-lg transition">
                                TERIMA
                            </button>
                            <button onclick="confirmDelete({{ $req->id }}, '{{ $req->business_name }}')"
                                class="bg-white border border-red-200 text-red-500 hover:bg-red-50 text-xs py-2 px-3 rounded-lg transition">
                                TOLAK
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-50">
            <h3 class="font-bold text-gray-800">Partisipan Aktif</h3>
        </div>
        <table class="w-full text-left text-sm overflow-auto">
            <thead class="bg-gray-50 text-gray-400 uppercase text-[10px] tracking-widest">
                <tr>
                    <th class="px-6 py-4">Bisnis</th>
                    <th class="px-6 py-4">Kontak</th>
                    <th class="px-6 py-4">Lokasi</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach ($participants as $p)
                    <tr wire:key="participant-{{ $p->id }}" class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="font-bold text-gray-900">{{ $p->business_name }}</div>
                            <div class="text-[10px] text-gray-400">{{ $p->business_field }}</div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">{{ $p->contact }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $p->city }}, {{ $p->province }}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-3">
                                <a wire:navigate href="{{ route('admin.participant.detail', $p->id) }}"
                                    class="p-2 text-amber-500 hover:bg-amber-50 rounded-xl transition duration-300 group"
                                    title="Lihat Detail & Edit">
                                    <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-6">
            {{ $participants->links('vendor.pagination.custom-amber') }}
        </div>
    </div>
</div>
