<div  x-data="{slideover: false}">
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

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true"
        x-transition:enter="transition ease-in-out duration-500"
        x-transition:enter-start="transform opacity-0"
        x-transition:enter-end="transform opacity-100"
        x-transition:leave="transition ease-in-out duration-500"
        x-transition:leave-start="transform opacity-100"
        x-transition:leave-end="transform opacity-0"
    >
        <!--
      Background backdrop, show/hide based on slide-over state.
  
      Entering: "ease-in-out duration-500"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in-out duration-500"
        From: "opacity-100"
        To: "opacity-0"
    -->
        <div x-show="slideover" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div x-show="slideover" class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10"
                x-transition:enter="transition ease-in-out duration-500 sm:duration-700"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-500 sm:duration-700"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
            >
                    <!--
                        Slide-over panel, show/hide based on slide-over state.
            
                        Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                        From: "translate-x-full"
                        To: "translate-x-0"
                        Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                        From: "translate-x-0"
                        To: "translate-x-full"
                    -->
                    <div class="pointer-events-auto relative w-screen max-w-md"
                        x-transition:enter="transition ease-in-out duration-500"
                        x-transition:enter-start="transform opacity-0"
                        x-transition:enter-end="transform opacity-100"
                        x-transition:leave="transition ease-in-out duration-90"
                        x-transition:leave-start="transform opacity-100"
                        x-transition:leave-end="transform opacity-0"
                    >
                        <!--
                        Close button, show/hide based on slide-over state.
            
                        Entering: "ease-in-out duration-500"
                            From: "opacity-0"
                            To: "opacity-100"
                        Leaving: "ease-in-out duration-500"
                            From: "opacity-100"
                            To: "opacity-0"
                        -->
                        <div class="absolute top-0 left-0 -ml-8 flex pt-4 pr-2 sm:-ml-10 sm:pr-4">
                            <button type="button" @click="slideover = false"
                                class="rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                                <span class="sr-only">Close panel</span>
                                <!-- Heroicon name: outline/x-mark -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl">
                            <div class="px-4 sm:px-6">
                                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Panel title</h2>
                            </div>
                            <div class="relative mt-6 flex-1 px-4 sm:px-6">
                                <!-- Replace with your content -->
                                <div class="absolute inset-0 px-4 sm:px-6">
                                    <div class="h-full border-2 border-dashed border-gray-200" aria-hidden="true"></div>
                                </div>
                                <!-- /End replace -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
