<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-5 mb-10">
        <div class="flex items-center gap-5">
            <div>
                <h1 class="text-3xl font-black text-gray-900 tracking-tight uppercase">Permintaan Sponsor</h1>
                <p class="text-sm text-gray-400">Kelola pengajuan kemitraan dan sponsorship</p>
            </div>
        </div>

        <div class="flex items-center gap-4">
            {{-- Input Search --}}
            <div class="relative group w-full md:w-72">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari nama instansi..."
                    class="w-full pl-12 pr-6 py-3 bg-white border border-gray-100 rounded-2xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all font-bold text-sm shadow-sm">
                <div class="absolute left-4 top-3.5 text-gray-300 group-focus-within:text-amber-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Table Section --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        @if ($sponsors->isEmpty())
            {{-- Empty State --}}
            <div class="p-20 text-center flex flex-col items-center">
                <div class="relative mb-6">
                    <div class="absolute inset-0 bg-amber-100 blur-2xl opacity-50 rounded-full"></div>
                    <div class="relative p-6 bg-amber-50 rounded-full border border-amber-100">
                        <svg class="w-12 h-12 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-gray-900 font-black uppercase tracking-tight text-lg">
                    {{ $search ? 'Pencarian Tidak Ditemukan' : 'Belum Ada Pengajuan' }}
                </h3>
                <p
                    class="text-gray-400 text-sm mt-2 font-medium max-w-xs mx-auto uppercase tracking-widest italic leading-relaxed">
                    {{ $search ? 'Tidak ada instansi yang cocok dengan kata kunci "' . $search . '"' : 'Belum ada pengajuan sponsorship yang masuk ke sistem.' }}
                </p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                                Instansi</th>
                            <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Kontak
                            </th>
                            <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                                Penawaran</th>
                            <th
                                class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">
                                Proposal</th>
                            <th
                                class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($sponsors as $sponsor)
                            <tr wire:key="sponsor-{{ $sponsor->id }}" class="hover:bg-amber-50/30 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-gray-800">{{ $sponsor->name }}</span>
                                        <span
                                            class="text-[10px] text-gray-400 font-bold uppercase tracking-tight">{{ $sponsor->email }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="https://wa.me/{{ $sponsor->contact }}" target="_blank"
                                        class="inline-flex items-center gap-2 group">
                                        <div
                                            class="p-2 bg-gray-50 rounded-lg group-hover:bg-amber-500 group-hover:text-white transition-all">
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                            </svg>
                                        </div>
                                        <span class="text-xs font-black text-gray-700">{{ $sponsor->contact }}</span>
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-500 line-clamp-1 italic max-w-xs">
                                        "{{ $sponsor->description }}"
                                    </p>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if ($sponsor->proposal_file)
                                        <a href="{{ asset('storage/proposals/' . $sponsor->proposal_file) }}"
                                            target="_blank"
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-gray-900 text-white rounded-xl text-[9px] font-black uppercase tracking-widest hover:bg-amber-600 transition-colors">
                                            Unduh
                                        </a>
                                    @else
                                        <span
                                            class="text-[9px] font-bold text-gray-300 uppercase italic tracking-widest border border-gray-100 px-3 py-1 rounded-lg">-
                                            No File -</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <button type="button" onclick="confirmDelete({{ $sponsor->id }})"
                                        class="p-2 text-gray-300 hover:text-red-500 rounded-xl transition-all duration-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Bagian Pagination --}}
            @if (method_exists($sponsors, 'links'))
                <div class="p-6 border-t border-gray-50">
                    {{ $sponsors->links('vendor.pagination.custom-amber') }}
                </div>
            @endif
        @endif
    </div>
</div>
