<div>
    <x-slot name="title">Cadastrar empresa</x-slot>
    <x-slot name="sidebar"></x-slot>

    <form wire:submit.prevent="saveCompany">
        <div class="sb-body">
            <x-errors class="mb-4" />
            <div class="grid-2">
                <x-select label="Segmento" wire:model.defer="segment_id" placeholder="Selecione" :async-data="route('api.segments')"
                    option-label="title" option-value="id">
                </x-select>
                <x-inputs.maskable wire:model.defer="cnpj" mask="##.###.###/####-##" label="CNPJ"
                    placeholder="00.000.000/0000-00" />
                <x-input wire:model.defer="corporate_name" label="Razão social" />
                <x-input wire:model.defer="fantasy_name" label="Nome fantasia" />
            </div>
            <div class="grid-2" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">
                <div>
                    <x-input type="file" wire:model.defer="logo" label="Logomarca" />
                </div>
                <div>
                    <div x-show="isUploading" class="mt-4 w-full rounded-3xl">
                        <progress class="w-full h-6 rounded-3xl" max="100" x-bind:value="progress"></progress>
                    </div>
                    <div x-show="!isUploading">
                        @if($validLogo)
                            <img src="{{ $validLogo->temporaryUrl() }}" class="h-20">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="sb-footer">
            <a class="text-sm mt-2 text-gray-600 hover:text-gray-900" href="#">Cancelar</a>
            <x-button type="submit" primary label="Salvar e continuar" />
        </div>
    </form>
</div>
