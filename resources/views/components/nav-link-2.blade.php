@props(['active'])

@php
    // Memastikan $active dikonversi menjadi boolean murni sebelum memilih class
    $classes = $active ?? false ? 'text-amber-500 font-bold' : 'text-slate-800 hover:text-amber-500 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
