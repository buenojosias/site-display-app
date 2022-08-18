<div>
    <div class="sb-form">
        <div class="sb-sidebar">
        </div>
        <div class="sb-container">
            <form wire:submit.prevent="saveAddress">
                <div class="sb-body">
                    <x-errors class="mb-4" />
                    <div class="grid-4">
                        <div class="md:col-span-2">
                            <x-input wire:model.defer="street_name" label="Nome da Rua" />
                        </div>
                        <x-input wire:model.defer="number" label="Número" />
                        <x-input wire:model.defer="complement" label="Complemento" />
                    </div>
                    <div class="grid-3">
                        <x-inputs.maskable wire:model.defer="zipcode" mask="##.###-###" label="CEP"
                            placeholder="00.000-000" />
                        <x-input wire:model.defer="district" label="Bairro" />
                        <x-input wire:model.defer="city" label="Cidade" />
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
