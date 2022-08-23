<x-app-layout>
    <x-slot name="header">Relatórios</x-slot>

    {{-- {{ $drivers->count() }} motoristas
    @foreach ($drivers as $driver)
        <x-card title="{{ $driver->id.' - '. $driver->name.' - '. $driver->displays_count .' - '. $driver->displays_sum_cost }}" class="m-4">
            {{ $driver }}
            <ul>
                @forelse ($driver->displays as $display)
                <li>
                     {{ $display->datetime->format('d/m') }} - {{ $display->cost }}
                </li>
                @empty
                    Nenhuma exibição
                @endforelse
            </ul>
        </x-card>
    @endforeach --}}

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Data</th>
                    <th class="text-left">Motorista</th>
                    <th>Exibições</th>
                    <th>Recompensa</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($drivers as $driver)
                    <tr>
                        <td>{{ $date }}</td>
                        <td class="text-left">{{ $driver->name }}</td>
                        <td class="text-center">{{ $driver->displays->count() }}</td>
                        <td class="text-center">{{ $driver->displays_sum_cost }}</td>
                        <td>
                            <x-button xs flat primary label="Sincronizar" class="my-0" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
