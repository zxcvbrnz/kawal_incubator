<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permintaan Sponsorship') }}
        </h2>
    </x-slot>

    <section>
        <livewire:admin.sponsor.table />
    </section>
</x-app-layout>
