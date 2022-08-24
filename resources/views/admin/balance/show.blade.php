<div>
    <x-slot name="header">Extrato financeiro</x-slot>

    <div class="list-header sm:flex-row">
        <div class="flex-grow mb-4 sm:mb-0 p-2 flex flex-col text-left bg-white sm:bg-transparent">
            <h2 class="text-xl sm:text-xl font-bold">{{ $data->fantasy_name ?? $data->name }}</h2>
        </div>
        <div class="search">
            <x-datetime-picker without-time without-timezone placeholder="Filtrar por data" :max="now()"
                wire:model="date" />
        </div>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Data</th>
                    <th class="text-center">Tipo</th>
                    <th class="left">Descrição</th>
                    <th class="text-center">Valor</th>
                    <th class="text-center">Saldo</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                    <tr class="text-center">
                        <td>{{ $transaction->created_at->format('d/m/Y') }}</td>
                        <td>{{ $transaction->type }}</td>
                        <td class="text-left">{{ $transaction->description }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->after }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Nenhum lançamento.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-2">
            {{ $transactions->links() }}
        </div>
    </div>

</div>
