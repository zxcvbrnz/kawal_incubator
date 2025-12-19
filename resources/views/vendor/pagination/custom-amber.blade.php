@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}"
        class="flex items-center justify-center gap-2 select-none">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-2 text-gray-400 bg-white border rounded-lg text-sm cursor-not-allowed">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <button wire:click="previousPage" onclick="window.scrollTo({top:0,behavior:'smooth'})"
                class="px-3 py-2 text-amber-600 bg-white border border-amber-300 rounded-lg hover:bg-amber-500 hover:text-white transition text-sm">
                {!! __('pagination.previous') !!}
            </button>
        @endif

        {{-- Pages --}}
        <div class="flex items-center gap-1">

            @php
                $current = $paginator->currentPage();
                $last = $paginator->lastPage();

                $mobileRange = 1; // active ±1
                $desktopRange = 2; // active ±2

                // Batas window (TIDAK BOLEH 1 atau last)
                $start = max(2, $current - $desktopRange);
                $end = min($last - 1, $current + $desktopRange);
            @endphp

            {{-- Page 1 --}}
            <button wire:click="gotoPage(1)" onclick="window.scrollTo({top:0,behavior:'smooth'})"
                class="hidden sm:inline-flex px-3 py-2 border rounded-lg text-sm
                {{ $current == 1 ? 'bg-amber-500 text-white border-amber-500 font-bold' : 'bg-white text-gray-700 hover:text-amber-500' }}">
                1
            </button>

            {{-- Left Ellipsis --}}
            @if ($start > 2)
                <span class="hidden sm:inline px-1 text-gray-400">…</span>
            @endif

            {{-- Window Pages --}}
            @for ($page = $start; $page <= $end; $page++)
                @if ($page == $current)
                    <span
                        class="px-3 py-2 bg-amber-500 text-white border border-amber-500 rounded-lg text-sm font-bold shadow">
                        {{ $page }}
                    </span>
                @else
                    <button wire:click="gotoPage({{ $page }})"
                        onclick="window.scrollTo({top:0,behavior:'smooth'})"
                        class="px-3 py-2 border rounded-lg text-sm transition
                        {{ abs($page - $current) > $mobileRange ? 'hidden sm:inline-flex' : 'inline-flex' }}
                        bg-white text-gray-700 hover:text-amber-500">
                        {{ $page }}
                    </button>
                @endif
            @endfor

            {{-- Right Ellipsis --}}
            @if ($end < $last - 1)
                <span class="hidden sm:inline px-1 text-gray-400">…</span>
            @endif

            {{-- Last Page --}}
            @if ($last > 1)
                <button wire:click="gotoPage({{ $last }})" onclick="window.scrollTo({top:0,behavior:'smooth'})"
                    class="hidden sm:inline-flex px-3 py-2 border rounded-lg text-sm
                    {{ $current == $last ? 'bg-amber-500 text-white border-amber-500 font-bold' : 'bg-white text-gray-700 hover:text-amber-500' }}">
                    {{ $last }}
                </button>
            @endif
        </div>

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <button wire:click="nextPage" onclick="window.scrollTo({top:0,behavior:'smooth'})"
                class="px-3 py-2 text-amber-600 bg-white border border-amber-300 rounded-lg hover:bg-amber-500 hover:text-white transition text-sm">
                {!! __('pagination.next') !!}
            </button>
        @else
            <span class="px-3 py-2 text-gray-400 bg-white border rounded-lg text-sm cursor-not-allowed">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
