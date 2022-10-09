<x-app-layout>
    <x-slot name="header">Painel administrativo</x-slot>

    <div class="w-full grid sm:grid-cols-2 md:grid-cols-3 gap-2">

        <div class="w-full">
            <div class="w-full p-4 rounded bg-white border border-gray-100">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">Empresas</div>
                        <div class="text-xl font-bold">{{ $companiesCount }}</div>
                    </div>
                    {{-- svg icon here 24px --}}
                </div>
            </div>
        </div>

        <div class="w-full">
            <div class="w-full p-4 rounded bg-white border border-gray-100">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">Motoristas</div>
                        <div class="text-xl font-bold">{{ $driversCount }}</div>
                    </div>
                    {{-- svg icon here 24px --}}
                </div>
            </div>
        </div>

        <div class="w-full">
            <div class="w-full p-4 rounded bg-white border border-gray-100">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">Campanhas ativas</div>
                        <div class="text-xl font-bold">{{ $advertisingsCount }}</div>
                    </div>
                    {{-- svg icon here 24px --}}
                </div>
            </div>
        </div>

        {{-- <div class="w-full lg:w-1/4">
            <div
                class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">
                            PREVIEWS
                        </div>
                        <div class="text-xl font-bold">
                            45
                        </div>
                    </div>
                    <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24"
                        width="24" xmlns="http://www.w3.org/2000/svg">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12">
                        </polyline>
                    </svg>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4">
            <div
                class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">
                            Links
                        </div>
                        <div class="text-xl font-bold">
                            4078
                        </div>
                    </div>
                    <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24"
                        width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6">
                        </path>
                        <polyline points="15 3 21 3 21 9">
                        </polyline>
                        <line x1="10" x2="21" y1="14" y2="3">
                        </line>
                    </svg>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4">
            <div
                class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">
                            Watch Time
                        </div>
                        <div class="text-xl font-bold">
                            31h 2m
                        </div>
                    </div>
                    <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24"
                        width="24" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="10">
                        </circle>
                        <polyline points="12 6 12 12 16 14">
                        </polyline>
                    </svg>
                </div>
            </div>
        </div> --}}
    </div>


</x-app-layout>
