<x-app-layout>
    <x-slot name="header">Campanhas da empresa</x-slot>

    <div class="w-full flex flex-col items-center sm:flex-row mb-8 px-3 py-4 bg-white shadow">
        <div>
            <img src="{{ asset('logos/lighting.png') }}" alt="Logo" class="w-32 sm:w-20">
        </div>
        <div class="flex-grow mx-4 py-2 flex flex-col text-center sm:text-left">
            <h2 class="text-xl sm:text-2xl font-bold">{{ $company->fantasy_name }}</h2>
            {{-- <h4 class="text-gray-800 font-semibold">{{ $segment->title }}</h4> --}}
        </div>
        <div class="flex flex-row gap-2 items-center">
            <x-button icon="plus" primary label="Criar nova" />
        </div>
    </div>

    @livewire('admin.company.company-advertisings', ['company' => $company])

</x-app-layout>