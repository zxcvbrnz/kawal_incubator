<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Video List') }}
        </h2>
    </x-slot>

    <section>
        <livewire:admin.video.all />
    </section>
</x-app-layout>
