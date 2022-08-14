<div>
    <x-slot name="header">Campanhas</x-slot>

    <div class="list-header">
        <div class="button">
            <x-button primary label="Criar nova" icon="plus" />
        </div>
        <div class="search">
            <x-input wire:model="search" icon="search" placeholder="Buscar campanha" class="w-full" />
        </div>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th class="left">Título</th>
                    <th class="left">Empresa</th>
                    <th class="center">Criação</th>
                    <th class="center">Expiração</th>
                    <th class="left">
                        <div class="flex items-center space-x-2">
                            <span>Status</span>
                            <x-dropdown class="font-normal normal-case">
                                <x-dropdown.item wire:click="filterStatus('')" label="Todas" />
                                <x-dropdown.item wire:click="filterStatus(1)" label="Ativas" />
                                <x-dropdown.item wire:click="filterStatus('false')" label="Inativas" />
                            </x-dropdown>
                        </div>
                    </th>
                    <th class="center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($advertisings as $advertising)
                    <tr>
                        <td>{{ $advertising->title }}</td>
                        <td>
                            <a href="{{ route('admin.companies.show', $advertising->company->id) }}" class="underline decoration-dotted decoration-sky-600">{{ $advertising->company->fantasy_name }}</a>
                        </td>
                        <td class="text-center">{{ $advertising->created_at->format('d/m/Y') }}</td>
                        <td class="text-center">{{ $advertising->expires_at ? $advertising->expires_at : 'Indeterminada' }}</td>
                        <td class="text-left">
                            <span @class([
                                'py-0.5 px-2 rounded-full text-xs',
                                'bg-green-200 text-green-900' => $advertising->active,
                                'bg-red-200 text-red-900' => !$advertising->active,
                            ])>
                                {{ $advertising->active ? 'Ativa' : 'Inativa' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="flex item-center justify-center">
                                <x-button flat rounded icon="eye" class="px-1 py-1" />
                                <x-button flat rounded icon="pencil" class="px-1 py-1" />
                                <x-button href="{{ route('admin.advertisings.displays', $advertising) }}" flat rounded icon="chart-bar" class="px-1 py-1" />
                            </div>
                        </td>
                    </tr>
                @empty
                <div class="px-6 py-2">
                    <p>Nenhuma campanha encontrada.</p>
                </div>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-2">
            {{ $advertisings->links() }}
        </div>
    </div>

</div>
