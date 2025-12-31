<x-main-layout>
    <x-slot name="title">
        Event
    </x-slot>
    <div class="min-h-screen py-20" x-on:page-changed.window="window.scrollTo({ top: 0, behavior: 'smooth' })">
        <div class="max-w-7xl mx-auto px-6">
            <div class="gap-6 mb-12">
                <div class="space-y-1 mt-2">
                    <h1 class="text-4xl font-bold text-gray-900 tracking-tight uppercase">
                        Event
                    </h1>
                    <p class="text-gray-500">
                        Terhubung, berbagi, dan berkembang bersama kami melalui rangkaian event lokal dan global yang
                        inspiratif.
                    </p>
                </div>
                <div class="mt-4 h-1 w-24 bg-amber-500 rounded-full"></div>
            </div>
            <div class="flex justify-center w-full mb-12">
                <div class="flex gap-8 border-b border-gray-100 w-full max-w-md justify-center">

                    <x-nav-event-link wire:navigate :active="request()->routeIs('event')" href="{{ route('event') }}">
                        Event Mendatang
                    </x-nav-event-link>

                    <x-nav-event-link wire:navigate :active="request()->routeIs('event.journey')" href="{{ route('event.journey') }}">
                        Perjalanan Kami
                    </x-nav-event-link>
                </div>
            </div>
            <section id="content">
                @if (request()->routeIs('event'))
                    <livewire:event.content />
                @elseif (request()->routeIs('event.journey'))
                    <livewire:event.journey />
                @endif
            </section>
        </div>
    </div>
</x-main-layout>
