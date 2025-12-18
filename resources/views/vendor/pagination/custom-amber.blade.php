@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-center gap-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-2 text-gray-400 bg-white border border-gray-200 rounded-lg cursor-not-allowed text-sm">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
                class="px-3 py-2 text-amber-600 bg-white border border-amber-300 rounded-lg hover:bg-amber-500 hover:text-white transition-colors duration-300 shadow-sm text-sm">
                {!! __('pagination.previous') !!}
            </button>
        @endif

        {{-- Pagination Elements --}}
        <div class="flex gap-1 items-center">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span
                        class="hidden sm:inline-flex px-3 py-2 text-gray-500 bg-white border border-gray-200 rounded-lg text-sm">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        {{-- Logika Limitasi Mobile:
                             1. Tampilkan jika halaman pertama
                             2. Tampilkan jika halaman terakhir
                             3. Tampilkan jika halaman aktif
                             4. Sembunyikan sisanya di mobile (hidden sm:inline-flex)
                        --}}
                        @php
                            $isEdge = $page == 1 || $page == $paginator->lastPage();
                            $isActive = $page == $paginator->currentPage();
                        @endphp

                        @if ($isActive)
                            <span
                                class="px-3 py-2 text-white bg-amber-500 border border-amber-500 rounded-lg shadow-md text-sm font-bold">
                                {{ $page }}
                            </span>
                        @elseif ($isEdge || abs($page - $paginator->currentPage()) <= 1)
                            {{-- Tampilkan 1 halaman di sekitar halaman aktif + halaman ujung --}}
                            <button wire:click="gotoPage({{ $page }})"
                                class="{{ $isEdge ? 'inline-flex' : 'hidden sm:inline-flex' }} px-3 py-2 text-gray-700 bg-white border border-gray-200 rounded-lg hover:border-amber-500 hover:text-amber-500 transition-all text-sm">
                                {{ $page }}
                            </button>
                        @elseif (abs($page - $paginator->currentPage()) == 2)
                            {{-- Titik-titik pembantu di mobile agar user tahu ada jeda --}}
                            <span class="sm:hidden text-gray-400 text-xs">..</span>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <button wire:click="nextPage" wire:loading.attr="disabled" rel="next"
                class="px-3 py-2 text-amber-600 bg-white border border-amber-300 rounded-lg hover:bg-amber-500 hover:text-white transition-colors duration-300 shadow-sm text-sm">
                {!! __('pagination.next') !!}
            </button>
        @else
            <span class="px-3 py-2 text-gray-400 bg-white border border-gray-200 rounded-lg cursor-not-allowed text-sm">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
