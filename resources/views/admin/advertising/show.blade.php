<x-app-layout>
    <x-slot name="header">Detalhes da campanha</x-slot>

    @if (session('success'))
        <x-success message="{{ session('success') }}" />
    @endif

    <div class="grid sm:grid-cols-2 mb-6 gap-4">
        <div>
            <div class="rounded mb-4 bg-white shadow divide-y">
                <div class="p-3">
                    <h5 class="text-sm font-semibold">Título</h5>
                    <h3 class="font-bold">{{ $advertising->title }}</h3>
                </div>
                <div class="p-3 flex flex-row justify-between">
                    <div>
                        <h5 class="text-sm font-semibold">Empresa</h5>
                        <h3 class="font-bold">{{ $advertising->company->fantasy_name }}</h3>
                    </div>
                    <div>
                        <x-button href="{{ route('admin.companies.show', $advertising->company) }}" flat rounded xl
                            icon="external-link" class="pl-3 pr-3 pt-3 pb-3" />
                    </div>
                </div>
            </div>
            <div class="grid sm:grid-cols-2 md:grid-cols-2 rounded bg-white shadow divide-y divide-x">
                <div class="p-3">
                    <h5 class="text-sm font-semibold">Data da criação</h5>
                    <h3 class="text-xl font-semibold">{{ $advertising->created_at->format('d/m/Y') }}</h3>
                </div>
                <div class="p-3">
                    <h5 class="text-sm font-semibold">Exibir até</h5>
                    <h3 class="text-xl font-semibold">{{ $advertising->expires_at ? $advertising->expires_at->format('d/m/Y') : 'Indeterminada' }}</h3>
                </div>
                <div class="p-3">
                    <h5 class="text-sm font-semibold">Custo por exibição</h5>
                    <h3 class="text-xl font-semibold">{{ $advertising->cpd }}</h3>
                </div>
                <div class="p-3">
                    <h5 class="text-sm font-semibold">Status</h5>
                    <h3 class="text-xl font-semibold">{{ $advertising->active ? 'Ativa' : 'Inativa' }}</h3>
                </div>
                <div class="p-3 flex flex-row justify-between">
                    <div>
                        <h3 class="text-2xl font-semibold">{{ $displays }}</h3>
                        <h5 class="text-sm font-semibold">exibições</h5>
                    </div>
                    <div>
                        <x-button href="{{ route('admin.advertisings.displays', $advertising) }}" flat rounded xl
                            icon="external-link" class="pl-3 pr-3 pt-3 pb-3" />
                    </div>
                </div>
                <div class="p-3">
                    <h3 class="text-2xl font-semibold">{{ $accesses }}</h3>
                    <h5 class="text-sm font-semibold">acessos</h5>
                </div>
            </div>
        </div>

        <video width="100%" class="rounded" preload="none" controls>
            <source src="{{ $advertising->video->path }}" type="video/mp4">
            Seu navegador não suporta a tag video.
        </video>
    </div>

    {{-- <div class="w-full bg-white shadow">
        <ul>
            @forelse ($dailyDisplays as $display)
                <li class="p-2">{{ $display }}</li>
            @empty
                lalala
            @endforelse
        </ul>
    </div> --}}

    {{-- <div class="w-full">Gráficos de exibições e acessos</div> --}}
    {{-- <div class="w-full">Exibições por dia</div> --}}
    {{-- <div class="w-full">Artes</div> --}}

</x-app-layout>
