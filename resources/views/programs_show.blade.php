<x-main-layout>
    <x-slot name="title">
        {{ str($name)->replace('-', ' ')->title() }}
    </x-slot>
    <section>
        <livewire:program.show :id="$id" />
    </section>
</x-main-layout>
