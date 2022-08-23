<div>
    <x-slot name="header">Fazer transação de motoristas</x-slot>

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
                @forelse ($drivers as $driver)
                    <tr>
                        <td>{{ $date }}</td>
                        <td class="text-left">{{ $driver->name }}</td>
                        <td class="text-center">{{ $driver->displays_count }}</td>
                        <td class="text-center">R$ {{ number_format($driver->displays[0]->reward/100, 2, ',', '.') }}</td>
                        <td>
                            <x-button wire:click="register()"
                                xs flat primary label="Lançar" class="my-0" />
                        </td>
                    </tr>
                @empty
                    Nenhum motorista com lançamento pendente para esta data.
                @endforelse
            </tbody>
        </table>
    </div>
    
</div>
