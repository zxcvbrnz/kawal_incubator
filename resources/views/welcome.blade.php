<x-main-layout>
    <x-slot name="title">
        Home
    </x-slot>
    <section class="relative overflow-hidden bg-white">
        <div class="absolute inset-0">
            <div class="absolute -top-32 -left-32 w-96 h-96 bg-amber-500/20 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 -right-32 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-6 pt-32 pb-24">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <span
                        class="inline-block mb-4 px-4 py-1 rounded-full bg-amber-500/10 text-amber-600 text-sm font-semibold">
                        🚀 Akselerator Bisnis Masa Depan
                    </span>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight text-gray-900">
                        Kawal
                        <span class="block text-amber-500">Incubator</span>
                    </h1>
                    <p class="mt-6 text-lg text-gray-600 max-w-xl">
                        Kawal Incubator hadir untuk memberdayakan inovator lokal melalui pendampingan intensif, akses
                        jaringan strategis, dan sumber daya terpadu untuk mengakselerasi ide Anda menjadi bisnis yang
                        berkelanjutan.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a wire:navigate href="{{ route('contact') }}"
                            class="px-6 py-3 rounded-xl bg-amber-500 text-white font-semibold hover:bg-amber-600 transition">
                            Hubungi Kami
                        </a>
                        <a wire:navigate href="{{ route('participant') }}"
                            class="px-6 py-3 rounded-xl border border-amber-500 text-amber-600 font-semibold hover:bg-amber-500/10 transition">
                            Partisipan
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="aspect-square rounded-3xl bg-amber-500/10 flex items-center justify-center">
                        <span class="text-7xl">💡</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="carousel1">
        <livewire:welcome.carousel1 />
    </section>
    <section id="colaboration">
        <livewire:welcome.colaboration />
    </section>
    <section id="program">
        <livewire:welcome.program />
    </section>
    <section id="team">
        <livewire:welcome.team />
    </section>
    <section id="news">
        <livewire:welcome.news />
    </section>
</x-main-layout>
