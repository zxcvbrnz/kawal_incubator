<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
        <div>
            <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Daftar Produk</h1>
            <p class="text-sm text-gray-500">Kelola semua produk partisipan di sini.</p>
        </div>

        <div class="flex flex-col md:flex-row gap-4 items-center">
            <div class="relative group w-full md:w-72">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari produk atau pemilik..."
                    class="w-full pl-12 pr-6 py-3 bg-white border border-gray-100 rounded-2xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all font-bold text-sm shadow-sm">
                <div class="absolute left-4 top-3.5 text-gray-300 group-focus-within:text-amber-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <a href="{{ route('admin.product.create') }}" wire:navigate
                class="w-full md:w-auto px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white rounded-2xl font-black shadow-lg shadow-amber-200 transition-all uppercase text-xs tracking-widest text-center">
                + Tambah Produk
            </a>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        @if ($products->isEmpty())
            <div class="p-20 text-center">
                <p class="text-gray-400 font-bold uppercase tracking-widest italic">Tidak ada produk ditemukan...</p>
            </div>
        @else
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Produk</th>
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Pemilik
                            (Bisnis)</th>
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Status</th>
                        <th
                            class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach ($products as $product)
                        <tr wire:key="prod-{{ $product->id }}" class="hover:bg-amber-50/30 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <img src="{{ asset('storage/product/' . $product->image_url) }}"
                                        class="w-12 h-12 rounded-xl object-cover border border-gray-100">
                                    <span class="font-bold text-gray-800">{{ $product->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm">
                                    <p class="font-bold text-gray-900">
                                        {{ $product->participant->business_name ?? 'N/A' }}</p>
                                    <p class="text-xs text-gray-500">{{ $product->participant->owner_name ?? 'N/A' }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter {{ $product->display ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-400' }}">
                                    {{ $product->display ? 'Ditampilkan' : 'Draft' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a wire:navigate href="{{ route('admin.product.edit', $product->id) }}"
                                    class="inline-block p-2 text-amber-500 hover:bg-amber-50 rounded-xl transition duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-6">
                {{ $products->links('vendor.pagination.custom-amber') }}
            </div>
        @endif
    </div>
</div>
