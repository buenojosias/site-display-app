<x-app-layout>
    <x-slot name="header">Exibições da campanha</x-slot>
    @livewire('admin.advertising.advertising-displays', ['advertising' => $advertising])

</x-app-layout>