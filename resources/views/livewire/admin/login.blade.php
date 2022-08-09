<div>
    <x-notifications />
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 px-2 sm:p-0 bg-gray-100">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form wire:submit.prevent="submit">
                <x-errors class="mb-4" />

                <div class="mt-4">
                    <x-input wire:model.defer="email" icon="user" label="E-mail" placeholder="Digite seu e-mail de administrador" />
                </div>
                <div class="mt-4">
                    <x-input wire:model.defer="password" type="password" label="Senha" placeholder="******" />
                </div>

                <div class="block mt-4">
                    <x-checkbox wire:model.defer="remember_me" label="Manter conectado" />
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            {{ __('Esqueci minha senha.') }}
                        </a>
                    @endif
    
                    <x-button wire:click="submit" class="ml-3" label="Entrar" spinner="save" primary />
                </div>
            </form>
        </div>

    </div>
</div>
