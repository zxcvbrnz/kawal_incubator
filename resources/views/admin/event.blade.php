<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event List') }}
        </h2>
    </x-slot>

    <section>
        <livewire:admin.event />
    </section>
</x-app-layout>
