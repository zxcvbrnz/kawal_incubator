<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Program Edit') }}
        </h2>
    </x-slot>

    <section>
        <livewire:admin.program.edit :id="$id" />
    </section>
</x-app-layout>
