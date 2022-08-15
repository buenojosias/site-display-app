<div>
    <x-slot name="header">Informativos</x-slot>

    <div class="list-header">
        <div class="button">
            <x-button primary label="Criar novo" icon="plus" />
        </div>
        <div class="search">
            <x-input wire:model="search" icon="search" placeholder="Buscar informativo" class="w-full" />
        </div>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th class="left">Título</th>
                    <th class="center">Criação</th>
                    <th class="center">Expiração</th>
                    <th class="left">
                        <div class="flex items-center space-x-2">
                            <span>Status</span>
                            <x-dropdown class="font-normal normal-case">
                                <x-dropdown.item wire:click="filterStatus('')" label="Todos" />
                                <x-dropdown.item wire:click="filterStatus(1)" label="Ativos" />
                                <x-dropdown.item wire:click="filterStatus('false')" label="Inativos" />
                            </x-dropdown>
                        </div>
                    </th>
                    <th class="center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($informatives as $informative)
                    <tr>
                        <td>{{ $informative->title }}</td>
                        <td class="text-center">{{ $informative->created_at->format('d/m/Y') }}</td>
                        <td class="text-center">{{ $informative->expires_at->format('d/m/Y - H:i') }}</td>
                        <td class="text-left">
                            <span @class([
                                'py-0.5 px-2 rounded-full text-xs',
                                'bg-green-200 text-green-900' => $informative->active,
                                'bg-red-200 text-red-900' => !$informative->active,
                            ])>
                                {{ $informative->active ? 'Ativo' : 'Inativo' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="flex item-center justify-center">
                                {{-- <x-button href="{{ route('admin.informatives.show', $informative) }}" flat rounded icon="eye" class="px-1 py-1" /> --}}
                                <x-button flat rounded icon="pencil" class="px-1 py-1" />
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
            {{ $informatives->links() }}
        </div>
    </div>

</div>
