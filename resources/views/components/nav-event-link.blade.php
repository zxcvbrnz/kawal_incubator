@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'pb-4 px-2 text-xs font-black uppercase tracking-[0.2em] border-b-2 border-amber-500 text-gray-900 transition-all duration-300'
            : 'pb-4 px-2 text-xs font-black uppercase tracking-[0.2em] border-b-2 border-transparent text-gray-400 hover:text-gray-600 hover:border-gray-200 transition-all duration-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
