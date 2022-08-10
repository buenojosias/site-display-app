<div>
    <x-slot name="header">Empresas</x-slot>

    <div class="list-header">
        <div class="button">
            <x-button href="{{ route('admin.companies.create') }}" primary label="Cadastrar" icon="plus" />
        </div>
        <div class="search">
            <x-input wire:model="search" icon="search" placeholder="Buscar empresa" class="w-full" />
        </div>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th class="left">Nome</th>
                    <th class="left">Representante</th>
                    <th class="left">
                        <div class="flex items-center space-x-2">
                            <span>Segmento</span>
                            <x-dropdown class="font-normal normal-case">
                                <x-dropdown.item wire:click="filterSegment('')" label="Todos" />
                                @foreach ($segments as $segment)
                                    <x-dropdown.item wire:click="filterSegment({{ $segment->id }})"
                                        label="{{ $segment->title }}" />
                                @endforeach
                            </x-dropdown>
                        </div>
                    </th>
                    <th class="center">
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
                @forelse ($companies as $company)
                    <tr>
                        <td class="whitespace-nowrap">
                            <div class="flex items-center">
                                @if ($company->logo)
                                    <div class="mr-2">
                                        <img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125"
                                            src="{{ asset('logos/'.$company->logo) }}" alt="Logo">
                                    </div>
                                @endif
                                <span class="font-medium">{{ $company->fantasy_name }}</span>
                            </div>
                        </td>
                        <td>
                            @if ($company->user)
                                <a href="#"
                                    class="underline decoration-dotted decoration-sky-600">{{ $company->user->name }}</a>
                            @else
                                <span class="text-orange-500">Nenhum usuário atribuído</span>
                            @endif
                        </td>
                        <td>
                            {{ $company->segment->title ?? '' }}
                        </td>
                        <td class="text-left">
                            <span @class([
                                'py-0.5 px-2 rounded-full text-xs',
                                'bg-green-200 text-green-900' => $company->active,
                                'bg-red-200 text-red-900' => !$company->active,
                            ])>
                                {{ $company->active ? 'Ativa' : 'Inativa' }}
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
                    <div class="px-6 py-2">
                        <p>Nenhum resultado encontrado.</p>
                    </div>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-2">
            {{ $companies->links() }}
        </div>
    </div>
</div>
