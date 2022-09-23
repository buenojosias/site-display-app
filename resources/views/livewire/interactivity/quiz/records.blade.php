<div>
    <x-slot name="title">Cliques nos quizzes</x-slot>

    <div class="list-header sm:flex-row">
        <div class="search">
            <x-datetime-picker
                without-time
                without-timezone
                placeholder="Filtrar por data"
                :max="now()"
                wire:model="date"
            />
        </div>  
    </div>

    <div class="bg-white rounded shadow">
        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th class="left">Data</th>
                        <th class="left">Pergunta</th>
                        <th class="left">Resposta</th>
                        <th class="left">Motorista</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($records as $record)
                        <tr>
                            <td>{{ $record->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $record->quiz->question }}</td>
                            <td>{{ $record->alternativ->answer }}</td>
                            <td>{{ $record->driver->name ?? '' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Nenhum registro encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-6 py-2">
                {{ $records->links() }}
            </div>
        </div>
    </div>

</div>
