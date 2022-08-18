<x-app-layout>
    <x-slot name="header">Editar motorista</x-slot>
    <x-dialog />
    @if (session('success'))
        <x-success message="{{ session('success') }}" />
    @endif
    <div class="sb-form">
        <div class="sb-sidebar">
            <x-form-nav-link href="{{ route('admin.drivers.edit', [$driver]) }}" active="{{ !$secao }}" label="Básico" />
            <x-form-nav-link href="{{ route('admin.drivers.edit', [$driver, 'address']) }}" active="{{ $secao === 'address' }}" label="Endereço" />
            <x-form-nav-link href="{{ route('admin.drivers.edit', [$driver, 'vehicle']) }}" active="{{ $secao === 'vehicle' }}" label="Veículo" />
            <x-form-nav-link href="{{ route('admin.drivers.edit', [$driver, 'user']) }}" active="{{ $secao === 'user' }}" label="Usuário" />
            {{-- <x-form-nav-link href="{{ route('admin.drivers.edit', [$driver, 'setup']) }}" label="Configuração" /> --}}
        </div>
        <div class="sb-container">

            @if (!$secao)
                @livewire('driver.driver-edit', ['driver' => $driver])
            @endif
            @if ($secao === 'address')
                @livewire('driver.driver-address', ['driver' => $driver])
            @endif
            @if ($secao === 'vehicle')
                @livewire('driver.driver-vehicle', ['driver' => $driver])
            @endif
            @if ($secao === 'setup')
                @livewire('driver.driver-setup', ['driver' => $driver])
            @endif
            @if ($secao === 'user')
                @livewire('driver.driver-user', ['driver' => $driver])
            @endif
        </div>
    </div>
</x-app-layout>
