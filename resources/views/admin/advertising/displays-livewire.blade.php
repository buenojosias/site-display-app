<div>

    <div class="list-header sm:flex-row">
        <div class="flex-grow mb-4 sm:mb-0 p-2 flex flex-col text-left bg-white sm:bg-transparent">
            <h2 class="text-xl sm:text-xl font-bold">{{ $advertising->title }}</h2>
            <h4 class="text-gray-800 font-semibold">{{ $advertising->company->fantasy_name }}</h4>
        </div>
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

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Data</th>
                    <th class="text-center">Horário</th>
                    <th class="left">Motorista</th>
                    <th class="text-center">Custo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($displays as $display)
                    <tr>
                        <td class="text-center">{{ $display->datetime->format('d/m/Y') }}</td>
                        <td class="text-center">{{ $display->datetime->format('H:i:s') }}</td>
                        <td>{{ $display->driver->name ?? '' }}</td>
                        <td class="text-center">{{ $display->cost }}</td>
                        <td>...</td>
                    </tr>
                @empty
                <tr>
                    <td colspan="5">Nenhuma exibição.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-2">
            {{ $displays->links() }}
        </div>
    </div>
</div>
