<x-app-layout>
    <x-slot name="header">Editar empresa</x-slot>
    <x-dialog />
    @if (session('success'))
        <x-success message="{{ session('success') }}" />
    @endif
    <div class="sb-form">
        <div class="sb-sidebar">
            <x-form-nav-link href="{{ route('admin.companies.edit', [$company]) }}" active="{{ !$secao }}"
                label="Básico" />
            <x-form-nav-link href="{{ route('admin.companies.edit', [$company, 'address']) }}"
                active="{{ $secao === 'address' }}" label="Endereço" />
            <x-form-nav-link href="{{ route('admin.companies.edit', [$company, 'link']) }}"
                active="{{ $secao === 'link' }}" label="Link" />
            <x-form-nav-link href="{{ route('admin.companies.edit', [$company, 'user']) }}"
                active="{{ $secao === 'user' }}" label="Usuário" />
            {{-- <x-form-nav-link href="{{ route('admin.companies.edit', [$company, 'setup']) }}" label="Configuração" /> --}}
        </div>
        <div class="sb-container">
            @if (!$secao)
                @livewire('company.company-edit', ['company' => $company])
            @endif
            @if ($secao === 'address')
                @livewire('company.company-address', ['company' => $company])
            @endif
            @if ($secao === 'user')
                @livewire('company.company-user', ['company' => $company])
            @endif
            @if ($secao === 'link')
                @livewire('company.company-link', ['company' => $company])
            @endif
        </div>
    </div>
</x-app-layout>
