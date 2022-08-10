<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Motoristas
        </h2>
    </x-slot>

    <div class="list-header">
        {{-- <div class="button">
            <x-button href="{{ route('admin.companies.create') }}" primary label="Cadastrar" icon="plus" />
        </div> --}}
        <div class="search">
            <x-input wire:model="search" icon="search" placeholder="Buscar motorista" class="w-full" />
        </div>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th class="left">Nome</th>
                    <th class="left">E-mail</th>
                    <th class="center">
                        <div class="flex items-center space-x-2">
                            <span>Status</span>
                            <x-dropdown class="font-normal normal-case">
                                <x-dropdown.item wire:click="filterStatus('')" label="Todos" />
                                <x-dropdown.item wire:click="filterStatus(1)" label="Ativos" />
                                <x-dropdown.item wire:click="filterStatus('false')" label="Inativos" />
                            </x-dropdown>
                        </div>
                    </th>
                    <th class="center">
                        <div class="flex items-center space-x-2">
                            <span>Trabalhando</span>
                            <x-dropdown class="font-normal normal-case">
                                <x-dropdown.item wire:click="filterWorking(1)" label="Sim" />
                                <x-dropdown.item wire:click="filterWorking('false')" label="Não" />
                                <x-dropdown.item wire:click="filterWorking('')" label="Indiferente" />
                            </x-dropdown>
                        </div>
                    </th>
                    <th class="center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($drivers as $driver)
                    <tr>
                        <td>{{ $driver->name }}</td>
                        <td>
                            @if ($driver->user)
                                <a href="#"
                                    class="underline decoration-dotted decoration-sky-600">{{ $driver->user->email }}</a>
                            @else
                                <span class="text-orange-500">Nenhum usuário atribuído</span>
                            @endif
                        </td>
                        <td class="text-left">
                            <span @class([
                                'py-0.5 px-2 rounded-full text-xs',
                                'bg-green-200 text-green-900' => $driver->active,
                                'bg-red-200 text-red-900' => !$driver->active,
                            ])>
                                {{ $driver->active ? 'Ativo' : 'Inativo' }}
                            </span>
                        </td>
                        <td class="text-left">
                            <span @class([
                                'py-0.5 px-2 rounded-full border border-blue-200 text-xs',
                                'bg-blue-100 text-blue-600' => $driver->working,
                                'text-blue-900' => !$driver->working,
                            ])>
                                {{ $driver->working ? 'Sim' : 'Não' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="flex item-center justify-center">
                                <x-button flat rounded icon="eye" class="px-1 py-1" />
                                <x-button flat rounded icon="pencil" class="px-1 py-1" />
                                <x-button flat rounded icon="collection" class="px-1 py-1" />
                                <x-button flat rounded icon="cash" class="px-1 py-1" />
                            </div>
                        </td>
                    </tr>
                @empty
                    Nenhum motorista encontrado
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-2">
            {{ $drivers->links() }}
        </div>
    </div>

</div>
