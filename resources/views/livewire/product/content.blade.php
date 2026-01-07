<div class="min-h-screen bg-white pt-4 pb-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse ($products as $product)
                <div
                    class="group bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-amber-50/50 transition-all duration-500 overflow-hidden flex flex-col">

                    <div class="relative aspect-[4/5] overflow-hidden">
                        <img src="{{ asset('storage/product/' . $product->image_url) }}" alt="{{ $product->name }}"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">

                        <div
                            class="absolute inset-0 bg-gradient-to-t from-amber-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                    </div>

                    <div class="py-4 px-6 flex-1 flex flex-col">
                        <h3 class="font-semibold text-sm text-gray-900 group-hover:text-amber-600 transition-colors duration-300 truncate"
                            title="{{ $product->name }}">
                            {{ $product->name }}
                        </h3>
                        <div class="text-[10px] text-gray-400 uppercase tracking-wider flex items-center min-w-0">
                            <span class="flex-shrink-0">Product by:&nbsp;</span>
                            <span class="text-amber-500 font-semibold truncate"
                                title="{{ $product->participant->business_name }}">
                                {{ $product->participant->business_name }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Empty State Produk --}}
                <div class="col-span-full py-32 flex flex-col items-center justify-center text-center">
                    <div class="relative mb-8">
                        {{-- Background Glow --}}
                        <div class="absolute inset-0 bg-amber-400 opacity-20 blur-[60px] rounded-full"></div>

                        {{-- Icon Box --}}
                        <div
                            class="relative flex items-center justify-center w-28 h-28 bg-gradient-to-br from-amber-50 to-white rounded-[2.5rem] border border-amber-100 shadow-sm">
                            <svg class="w-12 h-12 text-amber-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <div class="max-w-md px-6">
                        <h3 class="text-2xl font-black text-gray-900 uppercase tracking-tight mb-3">
                            Katalog <span class="text-amber-500">Kosong</span>
                        </h3>
                        <p class="text-gray-500 leading-relaxed text-sm mb-10 uppercase tracking-[0.1em]">
                            Produk UMKM unggulan kami sedang dalam tahap kurasi. Segera hadir untuk memenuhi kebutuhan
                            Anda.
                        </p>

                        <a href="/" wire:navigate
                            class="inline-flex items-center gap-3 px-10 py-4 bg-gray-900 text-white rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] transition-all hover:bg-amber-600 hover:shadow-xl hover:shadow-amber-200 active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7 7-7"></path>
                            </svg>
                            Eksplorasi Lainnya
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        @if ($products->isNotEmpty())
            <div class="mt-20">
                {{ $products->links('vendor.pagination.custom-amber') }}
            </div>
        @endif
    </div>
</div>
