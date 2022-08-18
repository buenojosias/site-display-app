@props(['active','label'])

@php
$classes = ($active ?? false)
            ? 'block pl-2 pr-4 py-2 border-l-8 border-slate-600 bg-slate-100 font-semibold text-slate-900 hover:bg-slate-100 transition duration-150 ease-in-out'
            : 'block pl-2 pr-4 py-2 border-l-8 border-transparent font-semibold text-slate-700 hover:text-slate-900 hover:border-slate-300 hover:bg-slate-50 focus:bg-slate-100 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $label }}
</a>
