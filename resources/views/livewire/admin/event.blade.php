<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Manajemen Event</h1>
            <p class="text-sm text-gray-500">Kelola jadwal dan galeri kegiatan incubator.</p>
        </div>
        <a href="{{ route('admin.event.create') }}" wire:navigate
            class="px-6 py-3 bg-amber-500 text-white rounded-2xl font-black shadow-lg shadow-amber-200 text-xs uppercase tracking-widest">
            + Event Baru
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($events as $event)
            <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden flex flex-col">
                <div class="relative h-48">
                    <img src="{{ asset('storage/event/' . $event->image_url) }}" class="w-full h-full object-cover">
                    <div class="absolute top-4 right-4">
                        <span
                            class="px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-widest {{ $event->status ? 'bg-gray-800 text-white' : 'bg-amber-500 text-white animate-pulse' }}">
                            {{ $event->status ? 'Selesai' : 'Berjalan' }}
                        </span>
                    </div>
                </div>
                <div class="p-6 flex-1">
                    <h3 class="font-black text-gray-900 uppercase text-lg mb-2">{{ $event->name }}</h3>
                    <p class="text-xs text-gray-400 mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                        </svg>
                        {{ $event->location }}
                    </p>
                    <div class="flex justify-between items-center mt-auto pt-4 border-t border-gray-50">
                        <span
                            class="text-[10px] font-bold text-gray-400 uppercase">{{ $event->start_at->format('d M Y') }}</span>
                        <a href="{{ route('admin.event.edit', $event->id) }}" wire:navigate
                            class="text-amber-500 font-black text-xs uppercase">Detail Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="p-6">
        {{ $events->links('vendor.pagination.custom-amber') }}
    </div>
</div>
