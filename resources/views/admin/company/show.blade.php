<x-app-layout>
    <x-slot name="header">Detalhes da empresa</x-slot>

    <div class="w-full flex flex-col items-center sm:flex-row mb-8 px-3">
        <div>
            <img src="{{ asset('logos/lighting.png') }}" alt="Logo" class="w-32 sm:w-20">
        </div>
        <div class="flex-grow mx-4 py-2 flex flex-col text-center sm:text-left">
            <h2 class="text-xl sm:text-2xl font-bold">{{ $company->fantasy_name }}</h2>
            <h4 class="text-gray-800 font-semibold">{{ $segment->title }}</h4>
        </div>
        <div class="flex flex-row gap-2 items-center">
            <x-button white label="Botão" />
            <x-button primary label="Botão" />
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

        <div class="col-span-2">
            <div class="mb-6 bg-white shadow-md">
                <div class="px-3 py-2 border border-t-0 border-l-0 border-r-0 font-semibold">
                    Informações básicas
                </div>
                <div class="grid sm:grid-cols-2">
                    <div class="px-3 py-2">
                        <p class="text-xs text-gray-700 font-semibold">CNPJ</p>
                        {{-- <h5 class="font-semibold">{{ $company->cnpj }}</h5> --}}
                        <h5 class="font-semibold">
                            {{ substr($company->cnpj, 0, 2) . '.' . substr($company->cnpj, 2, 3) . '.' . substr($company->cnpj, 5, 3) . '/' . substr($company->cnpj, 8, 4) . '-' . substr($company->cnpj, 12, 2) }}
                        </h5>
                    </div>
                    <div class="px-3 py-2">
                        <p class="text-xs text-gray-700 font-semibold">Razão Social</p>
                        <h5 class="font-semibold">{{ $company->corporate_name }}</h5>
                    </div>
                    <div class="px-3 py-2">
                        <p class="text-xs text-gray-700 font-semibold">Representante</p>
                        <h5 class="font-semibold">{{ $user->name ?? 'Não atribuído' }}</h5>
                    </div>
                    <div class="px-3 py-2">
                        <p class="text-xs text-gray-700 font-semibold">Data do cadastro</p>
                        <h5 class="font-semibold">{{ $company->created_at->format('d/m/Y') }}</h5>
                    </div>
                </div>
            </div>
            <div class="mb-6 bg-white shadow-md">
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
        </div>

        <div>
            <div class="mb-6 bg-white shadow-md">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt earum perferendis officia adipisci
                asperiores
                vero sequi tempora pariatur vel, non laborum aperiam? Ut asperiores nesciunt error, animi consequuntur
                ducimus ex?
            </div>
        </div>

        <div>
            <div class="mb-6 bg-white shadow-md">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt earum perferendis officia adipisci
                asperiores
                vero sequi tempora pariatur vel, non laborum aperiam? Ut asperiores nesciunt error, animi consequuntur
                ducimus ex?
            </div>
        </div>

        <div class="col-span-2">
            <div class="mb-6 bg-white shadow-md">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam nihil, ducimus aspernatur fugit
                temporibus, magni quidem enim obcaecati, nisi inventore laborum tempore earum a? Modi quae accusantium
                amet
                doloremque officiis?
            </div>
        </div>

    </div>

</x-app-layout>
