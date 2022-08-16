<x-app-layout>
    <x-dialog />
    <x-slot name="header">{{ $title }}</x-slot>

    <div class="sb-form">
        <div class="sb-sidebar">
            {{ $sidebar }}
        </div>

        <div x-data x-cloak class="sb-container">
            {{ $slot }}
        </div>

    </div>
</x-app-layout>