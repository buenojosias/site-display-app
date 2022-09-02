<div>
    <x-slot name="title">Cadastrar empresa</x-slot>
    <x-slot name="sidebar">
        <h3 class="p-2 mb-2 border-b-1 border-gray-200 font-bold">Segmentos</h3>
        <ul>
            @foreach ($segments as $segment)
                <li class="p-2 border-b-1 border-gray-100">
                    {{ $segment->title }}
                </li>
            @endforeach
        </ul>
        <div class="p-2 mt-2">
            <h4 class="text-sm font-bold">Adicionar novo</h4>
            <x-native-select wire:model.defer="segment_category_id" class="mb-2">
                <option value="">Selecione uma categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </x-native-select>
            <x-input wire:model.defer="segment_title" placeholder="Título do segmento">
                <x-slot name="append">
                    <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                        <x-button wire:click.prevent="saveSegment" class="h-full rounded-r-md" icon="check" primary
                            flat squared />
                    </div>
                </x-slot>
            </x-input>
        </div>
    </x-slot>

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
                        @if ($validLogo)
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
