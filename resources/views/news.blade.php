<x-main-layout>
    <x-slot name="title">
        News
    </x-slot>
    <div class="min-h-screen py-20" x-on:page-changed.window="window.scrollTo({ top: 0, behavior: 'smooth' })">
        <div class="max-w-7xl mx-auto px-6">
            <div class="space-y-1 mt-2">
                <h1 class="text-4xl font-bold text-gray-900 tracking-tight uppercase">
                    News
                </h1>
                <p class="text-gray-500">
                    Discover our latest stories, achievements, and technical insights from the world of innovation.
                </p>
            </div>
            <section>
                <livewire:news.content />
            </section>
        </div>
    </div>
</x-main-layout>
