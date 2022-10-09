@props(['active','label'])

@php
$classes = ($active ?? false)
            ? 'text-gray-600 font-semibold px-4 block hover:text-sky-700 focus:outline-none text-sky-800 transition duration-150 ease-in-out'
            : 'text-gray-600 font-semibold px-4 block hover:text-sky-700 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $label }}
</a>
