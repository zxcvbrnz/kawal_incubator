<div class="mt-8">
    <div class="mb-8 space-y-2">
        <h2 class="text-2xl">Our proudly participants</h2>
        <p class="text-gray-500">Discover the exceptional individuals who are driving innovation and excellence within
            our community.</p>
    </div>
    <div class="rounded-3xl border border-gray-100 shadow-xl shadow-gray-300 overflow-hidden">
        <div class="p-6 bg-amber-200">
            <div class="relative max-w-md">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search name..."
                    class="block w-full pl-11 pr-4 py-3 bg-white border border-gray-500 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all duration-300">
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-y border-gray-200 bg-gray-50/30">
                        <th wire:click="sortBy('id')"
                            class="px-8 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest cursor-pointer hover:text-amber-600 transition-colors">
                            <div class="flex items-center gap-2">
                                <span>ID</span>
                                @if ($sortField === 'id')
                                    <span class="text-amber-500">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                @endif
                            </div>
                        </th>
                        <th wire:click="sortBy('name')"
                            class="px-8 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest cursor-pointer hover:text-amber-600 transition-colors">
                            <div class="flex items-center gap-2">
                                <span>Participant Name</span>
                                @if ($sortField === 'name')
                                    <span class="text-amber-500">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                @endif
                            </div>
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse($participants as $person)
                        <tr class="group hover:bg-amber-50/30 transition-colors">
                            <td class="px-8 py-5">
                                <span
                                    class="text-sm font-mono text-gray-400 group-hover:text-amber-600 transition-colors">
                                    #{{ str_pad($person->id, 3, '0', STR_PAD_LEFT) }}
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="h-9 w-9 rounded-full bg-amber-100 text-amber-700 flex items-center justify-center font-bold text-sm">
                                        {{ substr($person->name, 0, 1) }}
                                    </div>
                                    <span
                                        class="text-sm font-bold text-gray-700 group-hover:text-amber-700 transition-colors">
                                        {{ $person->name }}
                                    </span>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-8 py-16 text-center">
                                <p class="text-gray-400 italic">No participants found match your search.</p>
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
