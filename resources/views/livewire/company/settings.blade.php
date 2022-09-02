<div>
    <form wire:submit.prevent="saveSettings">
        <div class="sb-header">
            <h2>Configurações</h2>
            {{-- <h5>Ao digitalizar o QR Code, o passageiro será direcionado para esta página</h5> --}}
        </div>
        <div class="sb-body">
            <x-errors class="mb-4" />
            <div class="grid-2">
                <x-input type="number" min="0" max="100" wire:model.defer="default_cost" label="Custo padrão das exibições" class="pr-24" suffix="centavos" />
                <x-input type="number" min="10" wire:model.defer="daily_limit" label="Limite diário de exibições" />
            </div>
        </div>
        <div class="sb-footer">
            <a class="text-sm mt-2 text-gray-600 hover:text-gray-900" href="#">Cancelar</a>
            <x-button type="submit" primary label="Salvar" />
        </div>
    </form>
</div>
