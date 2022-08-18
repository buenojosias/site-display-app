<div>
    <div class="sb-form">
        <div class="sb-sidebar">
        </div>
        <div class="sb-container">
            <form wire:submit.prevent="saveAddress">
                <div class="sb-body">
                    <x-errors class="mb-4" />
                    
                    @if ($currentUser)
                        <div class="flex flex-col lg:flex-row justify-between content-center">
                            <div class="text-lg font-semibold">{{ $currentUser->name }}</div>
                            <div class="text-sm">{{ $currentUser->email }}</div>
                            <div class="mt-4 lg:mt-0">
                                <x-button sm flat primary label="Alterar" />
                                <x-button sm flat negative label="Remover" />
                            </div>
                        </div>
                    @else

                        @if(!$users)
                        <div>
                            <div class="text-lg font-semibold">Nenhum usuário atribuído</div>
                            <div class="text-sm">Selecione um usuário existente ou gere uma chave para um novo cadastro</div>
                        </div>
                        <div class="mt-4">
                            <x-button wire:click="getUsers" sm primary label="Buscar usuários" />
                            <x-button sm outline primary label="Gerar chave" />
                        </div>
                        
                        @else
                            <div>
                                <div class="text-lg font-semibold mb-4">Selecione um usuário abaixo</div>
                                <ul class="mb-4">
                                    @foreach ($users as $user)
                                        <li class="border-b-1 border-gray-200 py-1 flex justify-between">
                                            {{ $user->name }}
                                            <x-button wire:click="setUser({{$user}})" flat primary icon="check" />
                                        </li>
                                    @endforeach
                                </ul>
                                <x-button wire:click="forgetUsers" sm label="Cancelar" />
                            </div>
                        @endif

                    @endif

                </div>
            </form>
        </div>
    </div>
</div>
