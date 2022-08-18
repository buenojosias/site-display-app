<x-app-layout>
    <x-slot name="header">Editar motorista</x-slot>
    <x-dialog />

    @if (session('success'))
        <x-success message="{{ session('success') }}" />
    @endif

    {{-- <div class="mb-6">
        @livewire('driver.driver-edit', ['driver' => $driver])
    </div>

    <div class="my-6">
        @livewire('driver.driver-address', ['driver' => $driver])
    </div>

    <div class="my-6">
        @livewire('driver.driver-user', ['driver' => $driver])
    </div> --}}

    <div class="my-6">
        @livewire('driver.driver-vehicle', ['driver' => $driver])
    </div>

</x-app-layout>
