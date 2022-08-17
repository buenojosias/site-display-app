
    ESTA VIEW SERÁ EXCLUÍDA

<div>
    <x-slot name="title">Cadastrar empresa</x-slot>

    <x-slot name="sidebar">
        <x-form-nav-link>Informações básicas</x-form-nav-link>
        <x-form-nav-link>Endereço</x-form-nav-link>
        <x-form-nav-link>Usuário</x-form-nav-link>
        <x-form-nav-link>Contatos</x-form-nav-link>
    </x-slot>

    <div x-data="{ tab: @entangle('tab') }">
        <template x-if="tab === 'company'">
            <div>
                {{-- <form wire:submit.prevent="saveCompany"> --}}
                <div class="sb-header">
                    <h2>Informações da empresa</h2>
                </div>
                
                {{-- </form> --}}
            </div>
        </template>

        <template x-if="tab === 'address'">
            <div>
                <div class="sb-header">
                    <h2>Endereço</h2>
                </div>
                <div class="sb-body">
                    <x-select label="Usuário responsável" wire:model.defer="user_id" placeholder="Selecione"
                        :async-data="route('api.users')" option-label="name" option-value="id" hint="Opcional por enquanto" />
                </div>
                <div class="sb-footer">
                    footer
                </div>
            </div>
        </template>

        <template x-if="tab === 'user'">
            <div>
                <div class="sb-header">
                    <h2>Atribuir usuário</h2>
                </div>
                <div class="sb-body">
                    body
                </div>
                <div class="sb-footer">
                    footer
                </div>
            </div>
        </template>

        <template x-if="tab === 'link'">
            <div>
                <div class="sb-header">
                    <h2>Links</h2>
                </div>
                <div class="sb-body">
                    body
                </div>
                <div class="sb-footer">
                    footer
                </div>
            </div>
        </template>

        {{-- <x-card title="Informações básicas">
        <form wire:submit.prevent="save">
            <x-errors class="mb-4" />

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <x-select label="Usuário responsável" wire:model.defer="user_id" placeholder="Selecione" :async-data="route('api.users')"
                    option-label="name" option-value="id" hint="Opcional por enquanto" />
                <x-select label="Segmento" wire:model.defer="segment_id" placeholder="Selecione" :async-data="route('api.segments')"
                    option-label="title" option-value="id">
                </x-select>
                <x-inputs.maskable wire:model.defer="cnpj" mask="##.###.###/####-##" label="CNPJ"
                    placeholder="00.000.000/0000-00" />
            </div>
            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-6">
                <x-input wire:model.defer="corporate_name" label="Razão social" />
                <x-input wire:model.defer="fantasy_name" label="Nome fantasia" />
            </div>

            <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-6">
                <x-inputs.maskable wire:model.defer="zipcode" mask="##.###-###" label="CEP"
                    placeholder="00.000-000" />
                <x-input wire:model.defer="street_name" label="Endereço" placeholder="Nome da rua" />
                <x-input wire:model.defer="number" label="Número" placeholder="000" />
                <x-input wire:model.defer="complement" label="Complemento" placeholder="Opcional" />
                <x-input wire:model.defer="district" label="Bairro" />
                <x-input wire:model.defer="city" label="Cidade" />
            </div>

            <x-slot name="footer">
                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click.prevent="save" label="Salvar" spinner="save" primary />
                </div>
            </x-slot>
        </form>
    </x-card> --}}
    </div>

</div>

</div>
