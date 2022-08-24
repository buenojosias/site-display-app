<x-app-layout>
    <x-slot name="header">Detalhes do motorista</x-slot>

    <div class="w-full flex flex-col items-center sm:flex-row mb-6 rounded py-4 px-3 bg-white shadow">
        <div class="flex-grow mr-4 flex flex-col text-center sm:text-left">
            <h2 class="text-xl sm:text-2xl font-bold">{{ $driver->name }}</h2>
            <h4 class="text-gray-800 text-sm font-semibold">{{ $user->email ?? '' }}</h4>
        </div>
        <div class="flex flex-row gap-2 items-center">
            <x-button href="{{ route('admin.drivers.displays', $driver) }}" white sm label="Exibições" />
            <x-button href="{{ route('admin.drivers.edit', $driver) }}" primary sm label="Editar" />
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

        <div class="col-span-2">
            <div class="mb-6 bg-white rounded shadow-md">
                <div class="px-3 py-2 border border-t-0 border-l-0 border-r-0 font-semibold">
                    Informações básicas
                </div>
                <div class="grid sm:grid-cols-3">
                    <div class="px-3 py-2">
                        <p class="text-xs text-gray-700 font-semibold">Nome completo</p>
                        <h5 class="font-semibold">{{ $driver->name }}</h5>
                    </div>
                    <div class="px-3 py-2">
                        <p class="text-xs text-gray-700 font-semibold">CPF</p>
                        {{-- <h5 class="font-semibold">{{ $driver->cpf }}</h5> --}}
                        <h5 class="font-semibold">
                            {{ $driver->cpf }}
                        </h5>
                    </div>
                    <div class="px-3 py-2">
                        <p class="text-xs text-gray-700 font-semibold">E-mail</p>
                        <h5 class="font-semibold">{{ $user->email ?? 'Usuário não atribuído' }}</h5>
                    </div>
                    <div class="px-3 py-2">
                        <p class="text-xs text-gray-700 font-semibold">Status</p>
                        <h5 class="font-semibold">{{ $driver->active ? 'Ativo' : 'Inativo' }}</h5>
                    </div>
                    <div class="px-3 py-2">
                        <p class="text-xs text-gray-700 font-semibold">Trabalhando agora</p>
                        <h5 class="font-semibold">{{ $driver->working ? 'Sim' : 'Não' }}</h5>
                    </div>
                    <div class="px-3 py-2">
                        <p class="text-xs text-gray-700 font-semibold">Data do cadastro</p>
                        <h5 class="font-semibold">{{ $driver->created_at->format('d/m/Y') }}</h5>
                    </div>
                </div>
            </div>
            @if ($address)
            <div class="mb-6 bg-white rounded shadow-md">
                <div class="px-3 py-2 border border-t-0 border-l-0 border-r-0 font-semibold">
                    Localização
                </div>
                <div class="grid sm:grid-cols-2 md:grid-cols-3">
                    <div class="px-3 py-2">
                        <p class="text-xs text-gray-700 font-semibold">Endereço</p>
                        <h5 class="font-semibold">{{ $address->street_name . ', ' . $address->number }}</h5>
                    </div>
                    <div class="px-3 py-2">
                        <p class="text-xs text-gray-700 font-semibold">Complemento</p>
                        <h5 class="font-semibold">{{ $address->complement }}</h5>
                    </div>
                    <div class="px-3 py-2">
                        <p class="text-xs text-gray-700 font-semibold">Bairro</p>
                        <h5 class="font-semibold">{{ $address->district ?? 'Não atribuído' }}</h5>
                    </div>
                    <div class="px-3 py-2">
                        <p class="text-xs text-gray-700 font-semibold">CEP</p>
                        <h5 class="font-semibold">{{ $address->zipcode }}</h5>
                    </div>
                    <div class="px-3 py-2 cols-span-2">
                        <p class="text-xs text-gray-700 font-semibold">Cidade</p>
                        <h5 class="font-semibold">{{ $address->city . '/' . $address->state }}</h5>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <div>
            <div class="mb-6 bg-white rounded shadow-md">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt earum perferendis officia adipisci
                asperiores
                vero sequi tempora pariatur vel, non laborum aperiam? Ut asperiores nesciunt error, animi consequuntur
                ducimus ex?
            </div>
        </div>

        <div>
            <div class="mb-6 bg-white rounded shadow-md">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt earum perferendis officia adipisci
                asperiores
                vero sequi tempora pariatur vel, non laborum aperiam? Ut asperiores nesciunt error, animi consequuntur
                ducimus ex?
            </div>
        </div>

        <div class="col-span-2">
            <div class="mb-6 bg-white rounded shadow-md">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam nihil, ducimus aspernatur fugit
                temporibus, magni quidem enim obcaecati, nisi inventore laborum tempore earum a? Modi quae accusantium
                amet
                doloremque officiis?
            </div>
        </div>

    </div>

</x-app-layout>
