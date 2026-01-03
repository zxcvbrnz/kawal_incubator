<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(key: 'News Create') }}
        </h2>
    </x-slot>

    <section>
        <livewire:admin.news.add />
    </section>
</x-app-layout>
