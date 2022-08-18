<x-app-layout>
    <x-slot name="header">Editar empresa</x-slot>
    <x-dialog />

    @if (session('success'))
        <x-success message="{{ session('success') }}" />
    @endif

    <div class="mb-6">
        @livewire('company.company-edit', ['company' => $company])
    </div>

    <div class="my-6">
        @livewire('company.company-address', ['company' => $company])
    </div>

    {{-- <div class="my-6">
        @livewire('company.company-user', ['company' => $company])
    </div> --}}

    <div class="my-6">
        @livewire('company.company-link', ['company' => $company])
    </div>

</x-app-layout>
