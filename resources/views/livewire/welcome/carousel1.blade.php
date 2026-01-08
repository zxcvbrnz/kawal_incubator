<div class="bg-white py-16 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        {{-- Header Section --}}
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-900">{{ __('Karya Unggulan Partisipan') }}</h2>
                <a href="{{ route('product') }}"
                    class="inline-flex items-center gap-2 text-sm font-semibold text-amber-600 hover:text-amber-700 transition">
                    {{ __('View More') }} →
                </a>
            </div>
            <p class="mt-4 text-gray-500">
                {{ __('Jelajahi berbagai produk inovatif hasil kurasi dan pengembangan intensif para wirausaha kreatif di Kawal Incubator.') }}
            </p>
        </div>

        {{-- Grid Section: 5 Kartu Kesamping --}}
        <div class="grid grid-cols-2 sm:grid-cols-5 gap-6">
            @foreach ($products as $item)
                <div class="bg-white rounded-2xl shadow-sm border border-amber-100 overflow-hidden flex flex-col">
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
            @endforeach
        </div>
    </div>
</div>
