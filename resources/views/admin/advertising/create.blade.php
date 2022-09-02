<div>
    <x-slot name="title">Criar campanha</x-slot>

    <x-slot name="sidebar">
        <div class="px-3 text-sm">
            
        </div>
    </x-slot>

    <div class="sb-header">
        <h2>Informações</h2>
        <h5>Insira as informações da campanha</h5>
    </div>
    <x-errors class="m-4" />
    <div class="sb-body">
        <div class="grid-2">
            <x-native-select label="Empresa" wire:model.defer="company_id">
                <option>Selecione</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->fantasy_name }}</option>
                @endforeach
            </x-native-select>
            <x-input wire:model.defer="title" cornerHint="Não será exibido para o passageiro" label="Título" />
        </div>
        <div class="grid-3">
            <x-datetime-picker without-timezone without-tips label="Exibir até" placeholder="Expiração"
                wire:model.defer="expires_at" :min="now()" interval="60" time-format="24" />
            <x-input type="number" label="Custo por exibição" class="pr-24" suffix="centavos"
                wire:model.defer="cpd" />
        </div>
        @if (!$validVideo)
            <div class="col-span-4" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">
                <div class="flex justify-center items-center w-full">
                    <label for="video"
                        class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col justify-center items-center pt-5 pb-6">
                            <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                <span class="font-semibold">Clique para selecionar o arquivo</span>
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">AVI, MP4 ou MPEG (máx. 10mb)</p>
                        </div>
                        <input id="video" type="file" wire:model.defer="video" class="hidden">
                    </label>
                </div>
                <div x-show="isUploading" class="mt-4 w-full rounded-3xl">
                    <progress class="w-full h-6 rounded-3xl" max="100" x-bind:value="progress"></progress>
                </div>
            </div>
        @endif
        @if ($validVideo)
            <video width="100%" class="rounded" controls>
                <source src="{{ $validVideo->temporaryUrl() }}" type="video/mp4">
                Seu navegador não suporta a tag video.
            </video>
        @endif

        <div x-data class="sb-footer">
            <x-button label="Cancelar" flat />
            <x-button wire:click="save" x-show="$wire.validVideo" icon="check" primary label="Salvar" />
        </div>
    </div>

</div>



{{-- <div>
    <x-dialog />
    <x-slot name="header">Criar informativo</x-slot>

    <div class="grid sm:grid-cols-3 md:grid-cols-4 sm:divide-x bg-white rounded shadow">
        <div class="py-4">
            <x-form-nav-link active="{{ $tab == 'basic' }}">Informações básicas</x-form-nav-link>
            <x-form-nav-link active="{{ $tab == 'media' }}">Mídia</x-form-nav-link>
        </div>

        <div x-data class="sm:col-span-2 md:col-span-3">

            <div x-show="$wire.tab == 'basic'" id="basic">
                <div class="p-4">
                    <h2 class="text-2xl font-bold text-gray-800">Informações básicas</h2>
                </div>
                <x-errors class="m-4" />
                <div class="p-4 grid md:grid-cols-3 gap-4">
                    <div class="md:col-span-2">
                        <x-input wire:model.defer="title" hint="Não será exibido para o passageiro" label="Título" />
                    </div>
                    <x-datetime-picker
                        without-timezone
                        without-tips
                        label="Exibir até"
                        placeholder="Expiração"
                        wire:model.defer="expires_at"
                        :min="now()"
                        interval="60"
                        time-format="24"
                    />
                </div>
                <div class="py-2 px-4 flex justify-between border-t-1 border-gray-200">
                    <x-button label="Cancelar" flat />
                    <x-button wire:click="saveBasic" icon="check" primary label="Salvar e continuar" />
                </div>
            </div>

            <div x-show="$wire.tab == 'media'" id="media">
                <h2 class="text-2xl font-bold text-gray-800">Adicionar vídeo</h2>
                ...
            </div>

        </div>
    </div>
</div> --}}
