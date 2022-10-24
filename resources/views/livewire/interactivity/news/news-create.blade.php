<div>
    <x-slot name="title">Nova notícia</x-slot>

    <div class="grid grid-cols-3 gap-6">

        <div class="col-span-2 p-4 bg-white rounded shadow">
            <form wire:submit.prevent="saveNews">
                <div class="w-full mb-4">
                    @if (!$validThumbnail)
                        <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <div class="flex justify-center items-center w-full">
                                <label for="thumbnail"
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
                                        <p class="text-xs text-gray-500 dark:text-gray-400">JPEG, PNG ou WEBP (máx. 3mb)
                                        </p>
                                    </div>
                                    <input id="thumbnail" type="file" wire:model.defer="thumbnail" class="hidden">
                                </label>
                            </div>
                            <div x-show="isUploading" class="mt-4 w-full rounded-3xl">
                                <progress class="w-full h-6 rounded-3xl" max="100"
                                    x-bind:value="progress"></progress>
                            </div>
                        </div>
                    @endif
                    @if ($validThumbnail)
                        <img src="{{ $validThumbnail->temporaryUrl() }}">
                    @endif
                </div>
                <x-errors class="mb-4" />
                @if ($validThumbnail)
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <x-input label="Título" placeholder="Título da notícia" wire:model.defer="title" />
                    </div>
                    <div>
                        <x-native-select label="Categoria" wire:model.defer="category_id">
                            <option value="">Selecione uma categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </x-native-select>
                    </div>
                    <div>
                        <x-datetime-picker label="Data" placeholder="Data" wire:model.defer="date" :min="now()"
                            :clearable="false" without-time without-tips />
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-4 mt-4">
                    <div>
                        <x-input label="Fonte" placeholder="Fonte da notícia" wire:model.defer="source" />
                    </div>
                    <div class="col-span-3">
                        <x-input label="URL" placeholder="Site para matéria" wire:model.defer="url" />
                    </div>
                </div>
                @endif

                <div class="mt-6 sb-footer">
                    <a class="text-sm mt-2 text-gray-600 hover:text-gray-900" href="{{route('admin.interactivity.news.list')}}">Cancelar</a>
                    <x-button type="submit" primary label="Salvar" />
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
