<div>
    <div class="list-header sm:flex-row p-2 pb-0">
        <div class="search">
            <x-datetime-picker without-time without-timezone without-tips clearable=false
                placeholder="Buscar data por data" :max="now()->subDays(1)" wire:model="date" />
        </div>
        <div>
            @if ($companies->count() < 1)
                <p class="text-sm">Nenhuma exibição registrada nesta data.</p>
            @endif
            @if (\Carbon\Carbon::parse($date)->format('Y-m-d') < date('Y-m-d') && $companies->count() > 0)
                <x-button wire:click="registerAll()" xs primary outline label="Lançar todas" />
            @endif
        </div>
    </div>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th class="left">Empresa</th>
                    <th>Exibições</th>
                    <th>Custo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td class="text-left">{{ $company->fantasy_name }}</td>
                        <td class="text-center">{{ $company->displays_count }}</td>
                        <td class="text-center">R$ {{ number_format($company->total_cost / 100, 2, ',', '.') }}</td>
                        <td>
                            <div class="flex flex-row justify-end items-center">
                                @if ($company->transactions_count === 0)
                                    <x-button wire:click.prevent="registerOne({{ $company->id }})" flat primary
                                        label="Lançar" class="my-0" />
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.563 9.75a12.014 12.014 0 00-3.427 5.136L9 12.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @endif
                                <x-button flat icon="map" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
