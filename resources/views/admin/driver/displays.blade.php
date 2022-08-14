<x-app-layout>
    <x-slot name="header">Exibições do motorista</x-slot>
    @livewire('admin.driver.driver-displays', ['driver' => $driver])

</x-app-layout>