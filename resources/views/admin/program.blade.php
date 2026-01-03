<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Program List') }}
        </h2>
    </x-slot>

    <section>
        <livewire:admin.program.all />
    </section>
</x-app-layout>
