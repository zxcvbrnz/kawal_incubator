<div class="min-h-screen bg-white pt-4 pb-16">
    <div class="max-w-7xl mx-auto">
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
                        <div class="">
                            <h3
                                class="font-semibold text-sm text-gray-900 group-hover:text-amber-600 transition-colors duration-300 line-clamp-2">
                                {{ $product->name }}
                            </h3>
                        </div>
                        <div class="text-[10px] text-gray-400 uppercase tracking-wider">
                            Made by: <span class="text-amber-500 font-semibold">{{ $product->participant->name }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <p class="text-gray-500 italic">No products found...</p>
                </div>
            @endforelse
        </div>

        <div class="mt-20">
            {{ $products->links('vendor.pagination.custom-amber') }}
        </div>

    </div>
</div>
