<x-main-layout>
    <x-slot name="title">
        {{ str($name)->replace('-', ' ')->title() }}
    </x-slot>
    <section>
        <livewire:news.show :id="$id" />
    </section>
</x-main-layout>
