<x-main-layout>
    <x-slot name="title">
        {{ $judul }}
    </x-slot>
    <section>
        <livewire:video.show :id="$id" />
    </section>
</x-main-layout>
