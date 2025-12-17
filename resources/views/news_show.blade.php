<x-main-layout>
    <x-slot name="title">
        {{ str($slug)->replace('-', ' ')->title() }}
    </x-slot>
    <section>
        <livewire:news.show :slug="$slug" />
    </section>
</x-main-layout>
