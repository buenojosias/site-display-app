<div>
    <x-slot name="title">Cadastrar motorista</x-slot>
    <x-slot name="sidebar"></x-slot>

    <form wire:submit.prevent="saveDriver">
        <div class="sb-body">
            <x-errors class="mb-4" />
            <div class="grid-2">
                <x-input wire:model.defer="name" label="Nome completo" />
                <x-inputs.maskable wire:model.defer="cpf" mask="###.###.###-##" label="CPF"
                    placeholder="000.000.000-00" />
            </div>
        </div>
        <div class="sb-footer">
            <a class="text-sm mt-2 text-gray-600 hover:text-gray-900" href="#">Cancelar</a>
            <x-button type="submit" primary label="Salvar" />
        </div>
    </form>
</div>
