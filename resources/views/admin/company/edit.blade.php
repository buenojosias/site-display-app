<x-app-layout>
    <x-slot name="header">Editar empresa</x-slot>
    @if (session('success'))
        <x-success message="{{ session('success') }}" />
    @endif

    {{ $company }}

</x-app-layout>
