@props(['active'])

@php
    $classes = $active ?? false ? 'text-amber-500' : 'text-slate-800 hover:text-amber-500 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
