<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(key: 'Event Create') }}
        </h2>
    </x-slot>

    <section>
        <livewire:admin.event.add />
    </section>
</x-app-layout>
