<div>
    <x-slot name="title">Criar informativo</x-slot>

    <div class="grid grid-cols-3 gap-6">
        <div class="col-span-2 p-4 bg-white rounded shadow">
            <x-errors class="m-4" />
            <form wire:submit.prevent="saveInformative">
                <div class="sb-body bg-white rounded">
                    <div class="mb-4">
                        <x-input wire:model.defer="title" cornerHint="Não será exibido para o passageiro"
                            label="Título" />
                    </div>
                    <div class="grid col-span-5 gap-4 mb-4">
                        <div class="col-span-2">
                            <x-native-select label="Categoria" wire:model.defer="category_id">
                                <option value="">Selecione uma categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </x-native-select>
                        </div class="col-span-2">
                        <div>
                            <x-datetime-picker without-timezone without-tips label="Exibir até" placeholder="Expiração"
                                wire:model.defer="expires_at" :min="now()" interval="60" time-format="24" />
                        </div>
                        <div class="pt-8">
                            <x-toggle md label="Ativo" wire:model.defer="active" />
                        </div>
                        <div class="col-span-5">
                            <x-input label="URL" placeholder="Site para matéria" wire:model.defer="url" />
                        </div>
                        {{-- @if(!$validMedia)
                        <x-native-select label="Tipo de mídia" wire:model="type">
                            <option value="">Selecione</option>
                            <option value="IMAGE">Imagem</option>
                            <option value="VIDEO">Vídeo</option>
                        </x-native-select>
                        @endif --}}
                    </div>

                    {{-- @if ($type && !$validMedia)
                        <div class="col-span-4" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <div class="flex justify-center items-center w-full">
                                <label for="media"
                                    class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                            <span class="font-semibold">Clique para selecionar o arquivo</span>
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            {{$type === 'IMAGE' ? 'JPEG, PNG ou WEBP (máx. 3mb)' : 'AVI, MP4 ou MPEG (máx. 10mb)' }}
                                        </p>
                                    </div>
                                    <input id="media" type="file" wire:model.defer="media" class="hidden">
                                </label>
                            </div>
                            <div x-show="isUploading" class="mt-4 w-full rounded-3xl">
                                <progress class="w-full h-6 rounded-3xl" max="100"
                                    x-bind:value="progress"></progress>
                            </div>
                        </div>
                    @endif
                    @if($validMedia && $type === 'VIDEO')
                        <video width="100%" class="rounded" controls>
                            <source src="{{ $validMedia->temporaryUrl() }}" type="video/mp4">
                            Seu navegador não suporta a tag video.
                        </video>
                    @elseif($validMedia && $type === 'IMAGE')
                        <img src="{{ $validMedia->temporaryUrl() }}">
                    @endif --}}
                </div>
                <div x-data class="sb-footer">
                    <x-button label="Cancelar" flat />
                    <x-button type="submit" icon="check" primary label="Salvar" />
                </div>
            </form>
        </div>

        <div class="bg-white rounded shadow">
            <h3 class="p-2 mb-2 border-b-1 border-gray-200 font-bold">Categorias</h3>
            <ul>
                @foreach ($categories as $category)
                    <li class="p-2 border-b-1 border-gray-100">{{ $category->title }}</li>
                @endforeach
            </ul>
            <div class="p-2 mt-2">
                <h4 class="text-sm font-bold">Adicionar nova</h4>
                <x-input wire:model.defer="category_title" placeholder="Título">
                    <x-slot name="append">
                        <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                            <x-button wire:click.prevent="saveCategory" class="h-full rounded-r-md" icon="check"
                                primary flat squared />
                        </div>
                    </x-slot>
                </x-input>
            </div>
        </div>

    </div>
</div>
