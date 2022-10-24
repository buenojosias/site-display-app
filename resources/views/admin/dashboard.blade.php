<x-app-layout>
    <x-slot name="header">Painel administrativo</x-slot>

    <div class="w-full grid sm:grid-cols-2 md:grid-cols-3 gap-3">
        <div class="w-full p-4 rounded bg-white border border-gray-200 shadow">
            <div class="flex flex-row items-center justify-between">
                <div class="flex flex-col">
                    <div class="text-sm uppercase font-semibold text-gray-600">Empresas</div>
                    <div class="text-2xl font-bold">{{ $companiesCount }}</div>
                </div>
                {{-- svg icon here 24px --}}
            </div>
        </div>
        <div class="w-full p-4 rounded bg-white border border-gray-200 shadow">
            <div class="flex flex-row items-center justify-between">
                <div class="flex flex-col">
                    <div class="text-sm uppercase font-semibold text-gray-600">Motoristas</div>
                    <div class="text-2xl font-bold">{{ $driversCount }}</div>
                </div>
                {{-- svg icon here 24px --}}
            </div>
        </div>
        <div class="w-full p-4 rounded bg-white border border-gray-200 shadow">
            <div class="flex flex-row items-center justify-between">
                <div class="flex flex-col">
                    <div class="text-sm uppercase font-semibold text-gray-600">Campanhas ativas</div>
                    <div class="text-2xl font-bold">{{ $advertisingsCount }}</div>
                </div>
                {{-- svg icon here 24px --}}
            </div>
        </div>
    </div>

    <div class="grid grid-cols-6 mt-6 gap-3">
        <div class="col-span-4 bg-white rounded shadow">
            <div class="table-wrapper">
                <h2 class="p-2 font-bold">Últimas exibições hoje</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="left">Horário</th>
                            <th class="left">Campanha</th>
                            <th class="left">Empresa</th>
                            <th class="left">Motorista</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lastDisplays as $display)
                        <tr>
                            <td>{{$display->datetime->format('H:i:s')}}</td>
                            <td>{{$display->advertising->title}}</td>
                            <td>{{$display->advertising->company->fantasy_name}}</td>
                            <td>{{$display->driver->name ?? ''}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    


</x-app-layout>
