<div class="bg-white py-16 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        {{-- Header Section --}}
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-900">{{ __('Karya Unggulan Partisipan') }}</h2>
                @if ($products->isNotEmpty())
                    <a href="{{ route('product') }}"
                        class="inline-flex items-center gap-2 text-sm font-semibold text-amber-600 hover:text-amber-700 transition">
                        {{ __('View More') }} →
                    </a>
                @endif
            </div>
            <p class="mt-4 text-gray-500">
                {{ __('Jelajahi berbagai produk inovatif hasil kurasi dan pengembangan intensif para wirausaha kreatif di Kawal Incubator.') }}
            </p>
        </div>

        {{-- Grid Section --}}
        <div class="grid grid-cols-2 sm:grid-cols-5 gap-6">
            @forelse ($products as $item)
                <div
                    class="bg-white rounded-2xl shadow-sm border border-amber-100 overflow-hidden flex flex-col hover:shadow-md transition duration-300">
                    <img src="{{ $item['image'] }}" class="h-44 w-full object-cover" alt="{{ $item['name'] }}" />
                    <div class="px-4 py-2 flex-1 flex flex-col">
                        <h3 class="font-semibold text-gray-800 text-sm mb-0.5 truncate block"
                            title="{{ $item['name'] }}">
                            {{ $item['name'] }}
                        </h3>
                        <div class="text-[10px] text-gray-400 uppercase tracking-wider flex items-center min-w-0">
                            <span class="whitespace-nowrap flex-shrink-0">{{ __('Product by') }}: &nbsp;</span>
                            <span class="text-amber-500 font-semibold truncate" title="{{ $item['participant'] }}">
                                {{ $item['participant'] }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Tampilan Jika Kosong (Empty State) --}}
                <div
                    class="col-span-full py-12 flex flex-col items-center justify-center border-2 border-dashed border-amber-100 rounded-[2.5rem] bg-amber-50/30">
                    <div class="w-16 h-16 bg-amber-100 rounded-2xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h3 class="text-gray-900 font-bold uppercase tracking-widest text-xs">
                        {{ __('Belum Ada Produk') }}
                    </h3>
                    <p class="text-gray-500 text-[10px] uppercase tracking-[0.2em] mt-1">
                        {{ __('Karya partisipan akan segera hadir di sini.') }}
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</div>
