@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 bg-sky-800 text-gray-100 rounded-sm text-base font-medium focus:bg-yellow-100'
            : 'block pl-3 pr-4 py-2 text-gray-300 rounded-sm text-base font-medium hover:text-white hover:bg-sky-800 focus:bg-sky-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
