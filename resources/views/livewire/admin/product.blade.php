<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Daftar Produk</h1>
            <p class="text-sm text-gray-500">Kelola semua produk partisipan di sini.</p>
        </div>
        <a href="{{ route('admin.product.create') }}" wire:navigate
            class="px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white rounded-2xl font-black shadow-lg shadow-amber-200 transition-all uppercase text-xs tracking-widest">
            + Tambah Produk
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Produk</th>
                    <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Pemilik
                        (Bisnis)</th>
                    <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Status</th>
                    <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach ($products as $product)
                    <tr class="hover:bg-amber-50/30 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('storage/product/' . $product->image_url) }}"
                                    class="w-12 h-12 rounded-xl object-cover border border-gray-100">
                                <span class="font-bold text-gray-800">{{ $product->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm">
                                <p class="font-bold text-gray-900">{{ $product->participant->business_name }}</p>
                                <p class="text-xs text-gray-500">{{ $product->participant->owner_name }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter {{ $product->display ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-400' }}">
                                {{ $product->display ? 'Ditampilkan' : 'Draft' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-3">
                                <a wire:navigate href="{{ route('admin.product.edit', $product->id) }}"
                                    class="p-2 text-amber-500 hover:bg-amber-50 rounded-xl transition duration-300 group"
                                    title="Lihat Detail & Edit">
                                    <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-6">
            {{ $products->links('vendor.pagination.custom-amber') }}
        </div>
    </div>
</div>
