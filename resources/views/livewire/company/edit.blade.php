<div>
    <div class="sb-form">
        <div class="sb-sidebar">
        </div>
        <div class="sb-container">
            <form wire:submit.prevent="saveCompany">
                <div class="sb-body">
                    <x-errors class="mb-4" />
                    <div class="grid-2">
                        <x-select label="Segmento" wire:model.defer="segment_id" placeholder="Selecione" :async-data="route('api.segments')"
                            option-label="title" option-value="id">
                        </x-select>
                        <x-inputs.maskable wire:model.defer="cnpj" mask="##.###.###/####-##" disabled label="CNPJ"
                            placeholder="00.000.000/0000-00" />
                        <x-input wire:model.defer="corporate_name" label="Razão social" />
                        <x-input wire:model.defer="fantasy_name" label="Nome fantasia" />
                    </div>
                </div>
                <div class="sb-footer">
                    <a class="text-sm mt-2 text-gray-600 hover:text-gray-900" href="#">Cancelar</a>
                    <x-button type="submit" primary label="Salvar" />
                </div>
            </form>
        </div>
    </div>
</div>