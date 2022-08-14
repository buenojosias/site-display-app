<x-app-layout>
    <x-slot name="header">Detalhes da campanha</x-slot>

    <div class="grid sm:grid-cols-2 mb-6 rounded bg-white shadow divide-x">
        <div class="p-3">
            <h5 class="text-sm font-semibold">Título</h5>
            <h3 class="font-bold">{{ $advertising->title }}</h3>
        </div>
        <div class="p-3">
            <h5 class="text-sm font-semibold">Empresa</h5>
            <h3 class="font-bold">Empresa...</h3>
        </div>
    </div>

    <div class="grid sm:grid-cols-2 md:grid-cols-4 mb-6 rounded bg-white shadow divide-x divide-y">
        <div class="p-3">
            <h5 class="text-sm font-semibold">Data da criação</h5>
            <h3 class="text-xl font-semibold">{{ $advertising->created_at->format('d/m/Y') }}</h3>
        </div>
        <div class="p-3">
            <h3 class="text-2xl font-semibold">{{ $displays }}</h3>
            <h5 class="text-sm font-semibold">exibições</h5>
        </div>
        <div class="p-3">
            <h3 class="text-2xl font-semibold">000</h3>
            <h5 class="text-sm font-semibold">acessos</h5>
        </div>
        <div class="p-3">
            <h5 class="text-sm font-semibold">Custo por exibição</h5>
            <h3 class="text-xl font-semibold">{{ $advertising->cpd }}</h3>
        </div>
    </div>

    <div class="w-full bg-white shadow">
        <ul>
            @forelse ($dailyDisplays as $display)
                <li class="p-2">{{ $display }}</li>
            @empty
                lalala
            @endforelse
        </ul>
    </div>

    <div class="w-full">Gráficos de exibições e acessos</div>
    <div class="w-full">Exibições por dia</div>
    <div class="w-full">Artes</div>

</x-app-layout>