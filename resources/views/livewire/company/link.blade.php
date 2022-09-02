<div>
    <form wire:submit.prevent="saveLink">
        <div class="sb-header">
            <h2>Link</h2>
            <h5>Ao digitalizar o QR Code, o passageiro será direcionado para esta página</h5>
        </div>
        <div class="sb-body">
            <div class="mb-3 border-b-1 border-gray-100 text-sm">
                <h5>Link na plataforma</h5>
                <p class="mb-3"><a href="{{ env('APP_URL').'/c/'.$slug }}" target="_blank">{{ env('APP_URL').'/c/'.$slug }}</a></p>
            </div>
            <x-errors class="mb-4" />
            <div class="grid-2">
                <x-inputs.maskable wire:model.defer="phone" mask="['(##) ####-####', '(##) #####-####']" label="Telefone"
                    placeholder="(00) 0000-0000" />
                <x-inputs.maskable wire:model.defer="whatsapp" mask="['(##) ####-####', '(##) #####-####']"
                    label="WhatsApp" placeholder="(00) 00000-0000" />
                <x-input wire:model.defer="facebook" label="Facebook" placeholder="Inserir link completo" />
                <x-input wire:model.defer="instagram" label="Instagram" placeholder="Apenas nome de usuário" />
                <x-input wire:model.defer="site" label="Site" placeholder="https://www.seusite.com"
                cornerHint="Deve ser completo, incluindo https" />
            </div>
        </div>
        <div class="sb-footer">
            <a class="text-sm mt-2 text-gray-600 hover:text-gray-900" href="#">Cancelar</a>
            <x-button type="submit" primary label="Salvar" />
        </div>
    </form>
</div>
