<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(key: 'Program Create') }}
        </h2>
    </x-slot>

    <section>
        <livewire:admin.program.add />
    </section>
</x-app-layout>
