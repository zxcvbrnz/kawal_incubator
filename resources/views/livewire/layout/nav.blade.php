<nav class="fixed top-0 left-0 w-full z-50 bg-white/30 backdrop-blur-md border-b border-white/20 py-2"
    x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center h-16">

            <!-- Logo (kiri) -->
            <a href="/" class="text-xl font-bold text-gray-900">
                <img class="w-32" src="{{ asset('logo kawal.png') }}" alt="">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex ml-auto items-center space-x-8 text-gray-800 font-medium">
                <x-nav-link-2 :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                    {{ __('Home') }}
                </x-nav-link-2>
                <x-nav-link-2 :href="route('participant')" :active="request()->routeIs('participant', 'participant.*')" wire:navigate>
                    {{ __('Participants') }}
                </x-nav-link-2>
                <x-nav-link-2 :href="route('product')" :active="request()->routeIs('product')" wire:navigate>
                    {{ __('Products') }}
                </x-nav-link-2>
                <x-nav-link-2 :href="route('program')" :active="request()->routeIs('program')" wire:navigate>
                    {{ __('Programs') }}
                </x-nav-link-2>
                <x-nav-link-2 :href="route('event')" :active="request()->routeIs('event', 'event.*')" wire:navigate>
                    {{ __('Events') }}
                </x-nav-link-2>
                <x-nav-link-2 :href="route('new')" :active="request()->routeIs('new')" wire:navigate>
                    {{ __('News') }}
                </x-nav-link-2>
                <x-nav-link-2 :href="route('about')" :active="request()->routeIs('about')" wire:navigate>
                    {{ __('About') }}
                </x-nav-link-2>
                <a href="{{ route('contact') }}"
                    class="px-4 py-2 rounded-lg bg-amber-500 text-white hover:bg-amber-300 transition duration-150">
                    Contact Us
                </a>
            </div>

            <!-- Hamburger (Mobile) -->
            <button @click="open = !open" class="md:hidden ml-auto relative w-8 h-6" type="button">
                <span :class="{ 'rotate-45 top-1/2': open, 'top-0': !open }"
                    class="absolute left-0 w-full h-0.5 bg-gray-800 transition-all duration-300"></span>
                <span :class="{ 'opacity-0': open }"
                    class="absolute left-0 w-full h-0.5 bg-gray-800 transition-all duration-300 top-1/2 -translate-y-1/2"></span>
                <span :class="{ '-rotate-45 bottom-1/2': open, 'bottom-0': !open }"
                    class="absolute left-0 w-full h-0.5 bg-gray-800 transition-all duration-300"></span>
            </button>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition:enter="transition transform ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition transform ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 -translate-y-2" class="md:hidden px-6 py-4 space-y-6">
        <x-nav-link-2 :href="route('home')" class="block" :active="request()->routeIs('home')" wire:navigate>
            {{ __('Home') }}
        </x-nav-link-2>
        <x-nav-link-2 :href="route('participant')" class="block" :active="request()->routeIs('participant')" wire:navigate>
            {{ __('Participants') }}
        </x-nav-link-2>
        <x-nav-link-2 :href="route('product')" class="block" :active="request()->routeIs('product')" wire:navigate>
            {{ __('Products') }}
        </x-nav-link-2>
        <x-nav-link-2 :href="route('program')" class="block" :active="request()->routeIs('program')" wire:navigate>
            {{ __('Programs') }}
        </x-nav-link-2>
        <x-nav-link-2 :href="route('event')" class="block" :active="request()->routeIs('event')" wire:navigate>
            {{ __('Events') }}
        </x-nav-link-2>
        <x-nav-link-2 :href="route('new')" class="block" :active="request()->routeIs('new')" wire:navigate>
            {{ __('News') }}
        </x-nav-link-2>
        <x-nav-link-2 :href="route('about')" class="block" :active="request()->routeIs('about')" wire:navigate>
            {{ __('About') }}
        </x-nav-link-2>
        <a href="{{ route('contact') }}" class="block text-center px-4 py-2 rounded-lg bg-amber-500 text-white">
            Contact Us
        </a>
    </div>
</nav>
