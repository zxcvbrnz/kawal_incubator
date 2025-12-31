<x-main-layout>
    <x-slot name="title">
        Program
    </x-slot>
    <div class="min-h-screen py-20" x-on:page-changed.window="window.scrollTo({ top: 0, behavior: 'smooth' })">
        <div class="max-w-7xl mx-auto px-6">
            <div class="gap-6 mb-12">
                <div class="space-y-1 mt-2">
                    <h1 class="text-4xl font-bold text-gray-900 tracking-tight uppercase">
                        Program
                    </h1>
                    <p class="text-gray-500">
                        Jelajahi inisiatif khusus kami yang dirancang untuk membina talenta dan mempercepat inovasi.
                    </p>
                </div>
                <div class="mt-4 h-1 w-24 bg-amber-500 rounded-full"></div>
            </div>
            <section id="content">
                <livewire:program.content />
            </section>
        </div>
    </div>
</x-main-layout>
