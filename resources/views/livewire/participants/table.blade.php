<div class="mt-8">
    <div class="mb-8 space-y-2">
        <h2 class="text-2xl font-bold text-gray-800">Our Proudly Participants</h2>
        <p class="text-gray-500">Discover the exceptional businesses driving innovation and excellence within our
            community.</p>
    </div>

    <div class="rounded-[2rem] border border-gray-100 shadow-xl shadow-gray-200 overflow-hidden bg-white">
        <div class="p-6 bg-amber-50/50 border-b border-gray-100">
            <div class="relative max-w-md">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input wire:model.live.debounce.300ms="search" type="text"
                    placeholder="Search business, owner, or field..."
                    class="block w-full pl-11 pr-4 py-3 bg-white border border-gray-200 rounded-2xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300 shadow-sm">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-amber-200">
                        <th wire:click="sortBy('business_name')"
                            class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest cursor-pointer hover:text-amber-600 transition-colors">
                            <div class="flex items-center gap-2">
                                <span>Business Name</span>
                                @if ($sortField === 'business_name')
                                    <span
                                        class="text-amber-500 text-base">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                @endif
                            </div>
                        </th>
                        <th wire:click="sortBy('owner_name')"
                            class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest cursor-pointer hover:text-amber-600 transition-colors">
                            <div class="flex items-center gap-2">
                                <span>Owner</span>
                                @if ($sortField === 'owner_name')
                                    <span
                                        class="text-amber-500 text-base">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                @endif
                            </div>
                        </th>
                        <th wire:click="sortBy('business_field')"
                            class="px-8 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest cursor-pointer hover:text-amber-600 transition-colors">
                            <div class="flex items-center gap-2">
                                <span>Business Field</span>
                                @if ($sortField === 'business_field')
                                    <span
                                        class="text-amber-500 text-base">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                @endif
                            </div>
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-50">
                    @forelse($participants as $person)
                        <tr class="group hover:bg-amber-50/30 transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="h-12 w-12 rounded-2xl bg-amber-100 overflow-hidden flex-shrink-0 border border-amber-200 shadow-sm">
                                        @if ($person->profile_photo)
                                            <img src="{{ asset('storage/' . $person->profile_photo) }}"
                                                class="h-full w-full object-cover">
                                        @else
                                            <div
                                                class="h-full w-full flex items-center justify-center text-amber-700 font-black text-lg">
                                                {{ substr($person->business_name, 0, 1) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex flex-col">
                                        <span
                                            class="text-sm font-bold text-gray-700 group-hover:text-amber-700 transition-colors">
                                            {{ $person->business_name }}
                                        </span>
                                        <span class="text-[10px] font-mono text-gray-400 uppercase">
                                            #{{ str_pad($person->id, 3, '0', STR_PAD_LEFT) }}
                                        </span>
                                    </div>
                                </div>
                            </td>

                            <td class="px-8 py-5">
                                <span class="text-sm text-gray-600 font-medium">
                                    {{ $person->owner_name }}
                                </span>
                            </td>

                            <td class="px-8 py-5">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-amber-50 text-amber-700 border border-amber-100">
                                    {{ $person->business_field }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-8 py-20 text-center">
                                <div class="flex flex-col items-center justify-center space-y-3">
                                    <svg class="h-12 w-12 text-gray-200" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                    <p class="text-gray-400 font-medium italic">No businesses match your search
                                        criteria.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-8 py-6 border-t border-gray-200 bg-amber-200">
            {{ $participants->links('vendor.pagination.custom-amber') }}
        </div>
    </div>
</div>
