<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Empresas
        </h2>
    </x-slot>

    <div class="mb-6 flex flex-row items-center sm:flex-row-reverse justify-between flex-wrap">
        <div class="w-full sm:w-2/5 lg:w-3/5 mb-2 sm:mb-0 grid justify-items-end">
            <x-button primary label="Adicionar" icon="plus" />
        </div>
        <div class="w-full sm:w-3/5 lg:w-2/5">
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
                                <x-dropdown.item
                                    wire:click="setSegment('')"
                                    label="TODOS"
                                    class="item"
                                />
                                @foreach ($segments as $segment)
                                    <x-dropdown.item
                                        wire:click="setSegment({{$segment->id}})"
                                        label="{{$segment->title}}"
                                    />
                                @endforeach
                            </x-dropdown>
                        </div>
                    </th>
                    <th class="center">Status</th>
                    <th class="center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($companies as $company)
                    <tr>
                        <td class="whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24"
                                        height="24" viewBox="0 0 48 48" style=" fill:#000000;">
                                        <path fill="#80deea"
                                            d="M24,34C11.1,34,1,29.6,1,24c0-5.6,10.1-10,23-10c12.9,0,23,4.4,23,10C47,29.6,36.9,34,24,34z M24,16	c-12.6,0-21,4.1-21,8c0,3.9,8.4,8,21,8s21-4.1,21-8C45,20.1,36.6,16,24,16z">
                                        </path>
                                        <path fill="#80deea"
                                            d="M15.1,44.6c-1,0-1.8-0.2-2.6-0.7C7.6,41.1,8.9,30.2,15.3,19l0,0c3-5.2,6.7-9.6,10.3-12.4c3.9-3,7.4-3.9,9.8-2.5	c2.5,1.4,3.4,4.9,2.8,9.8c-0.6,4.6-2.6,10-5.6,15.2c-3,5.2-6.7,9.6-10.3,12.4C19.7,43.5,17.2,44.6,15.1,44.6z M32.9,5.4	c-1.6,0-3.7,0.9-6,2.7c-3.4,2.7-6.9,6.9-9.8,11.9l0,0c-6.3,10.9-6.9,20.3-3.6,22.2c1.7,1,4.5,0.1,7.6-2.3c3.4-2.7,6.9-6.9,9.8-11.9	c2.9-5,4.8-10.1,5.4-14.4c0.5-4-0.1-6.8-1.8-7.8C34,5.6,33.5,5.4,32.9,5.4z">
                                        </path>
                                        <path fill="#80deea"
                                            d="M33,44.6c-5,0-12.2-6.1-17.6-15.6C8.9,17.8,7.6,6.9,12.5,4.1l0,0C17.4,1.3,26.2,7.8,32.7,19	c3,5.2,5,10.6,5.6,15.2c0.7,4.9-0.3,8.3-2.8,9.8C34.7,44.4,33.9,44.6,33,44.6z M13.5,5.8c-3.3,1.9-2.7,11.3,3.6,22.2	c6.3,10.9,14.1,16.1,17.4,14.2c1.7-1,2.3-3.8,1.8-7.8c-0.6-4.3-2.5-9.4-5.4-14.4C24.6,9.1,16.8,3.9,13.5,5.8L13.5,5.8z">
                                        </path>
                                        <circle cx="24" cy="24" r="4" fill="#80deea">
                                        </circle>
                                    </svg>
                                </div>
                                <span class="font-medium">{{ $company->fantasy_name }}</span>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="underline decoration-dotted decoration-sky-600">{{ $company->user->name }}</a>
                        </td>
                        <td>
                            {{ $company->segment->title }}
                        </td>
                        <td class="text-center">
                            <span class="bg-green-200 text-green-900 py-0.5 px-2 rounded-full text-xs">Active</span>
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
