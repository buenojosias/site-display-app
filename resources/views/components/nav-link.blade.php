@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-sky-800 shadow-md text-gray-100 px-3 py-2 rounded-md text-sm font-medium leading-5 focus:outline-none focus:border-indigo-700'
            : 'text-gray-300 px-3 py-2 rounded-md text-sm font-medium hover:bg-sky-800 hover:text-white focus:bg-sky-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
