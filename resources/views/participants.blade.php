<x-main-layout>
    <x-slot name="title">
        Peserta
    </x-slot>
    <div class="min-h-screen py-20" x-on:page-changed.window="window.scrollTo({ top: 0, behavior: 'smooth' })">
        <div class="max-w-7xl mx-auto px-6">
            <div class="gap-6 mb-12">
                <div class="space-y-1 mt-2">
                    <h1 class="text-4xl font-bold text-gray-900 tracking-tight uppercase">
                        Partisipan
                    </h1>
                    <p class="text-gray-500">
                        Bergabunglah dengan komunitas kami yang terus berkembang dan terhubung dengan sesama.
                    </p>
                </div>
                <div class="mt-4 h-1 w-24 bg-amber-500 rounded-full"></div>
            </div>
            <a href="{{ route('participant.form') }}"
                class="inline-flex items-center justify-center px-8 py-3.5 bg-amber-500 hover:bg-amber-600 text-white font-bold rounded-xl shadow-lg shadow-amber-200 transition-all duration-300 transform hover:-translate-y-1 active:scale-95 group">
                <span>Jadilah Bagian dari Inovasi</span>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
            <section id="table">
                <livewire:participants.table />
            </section>
        </div>
    </div>
</x-main-layout>
