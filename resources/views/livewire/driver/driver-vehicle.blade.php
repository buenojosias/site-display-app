<div>
    <div class="sb-form">
        <div class="sb-sidebar">
        </div>
        <div class="sb-container">
            <form wire:submit.prevent="saveVehicle">
                <div class="sb-body">
                    <x-errors class="mb-4" />
                    <div class="grid-2">
                        <x-input wire:model.defer="brand" label="Marca (fabricante)" />
                        <x-input wire:model.defer="model" label="Modelo" />
                    </div>
                    <div class="grid-3">
                        <x-input wire:model.defer="color" label="Cor" />
                        <x-inputs.maskable wire:model.defer="year" mask="####" label="Ano"
                            placeholder="0000" />
                        <x-input wire:model.defer="license_plate" label="Placa" />
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
