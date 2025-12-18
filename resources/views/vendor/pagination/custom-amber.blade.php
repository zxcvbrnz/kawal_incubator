@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-center gap-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-gray-400 bg-white border border-gray-200 rounded-lg cursor-not-allowed">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
                class="px-4 py-2 text-amber-600 bg-white border border-amber-300 rounded-lg hover:bg-amber-500 hover:text-white transition-colors duration-300 shadow-sm">
                {!! __('pagination.previous') !!}
            </button>
        @endif

        {{-- Pagination Elements --}}
        <div class="flex gap-1">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span
                        class="px-4 py-2 text-gray-500 bg-white border border-gray-200 rounded-lg">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span
                                class="px-4 py-2 text-white bg-amber-500 border border-amber-500 rounded-lg shadow-md">{{ $page }}</span>
                        @else
                            <button wire:click="gotoPage({{ $page }})"
                                class="px-4 py-2 text-gray-700 bg-white border border-gray-200 rounded-lg hover:border-amber-500 hover:text-amber-500 transition-all">
                                {{ $page }}
                            </button>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <button wire:click="nextPage" wire:loading.attr="disabled" rel="next"
                class="px-4 py-2 text-amber-600 bg-white border border-amber-300 rounded-lg hover:bg-amber-500 hover:text-white transition-colors duration-300 shadow-sm">
                {!! __('pagination.next') !!}
            </button>
        @else
            <span class="px-4 py-2 text-gray-400 bg-white border border-gray-200 rounded-lg cursor-not-allowed">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
