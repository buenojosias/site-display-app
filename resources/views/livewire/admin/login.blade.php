<div>
    <x-notifications />
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 px-2 sm:p-0 bg-gray-100">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form wire:submit.prevent="submit">
                
                <x-errors class="mb-4" />
                @if (session()->has('error'))
                    <div
                        class="rounded-lg bg-negative-50 dark:bg-secondary-800 dark:border dark:border-negative-600 p-4 mb-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-negative-400 shrink-0 mr-3" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm font-semibold text-negative-800 dark:text-negative-600">
                                E-mail ou senha incorreto.
                            </span>
                        </div>
                    </div>
                @endif

                <div class="mt-4">
                    <x-input wire:model.defer="email" icon="user" label="E-mail" placeholder="Digite seu e-mail" />
                </div>
                <div class="mt-4">
                    <x-input wire:model.defer="password" icon="lock-closed" type="password" label="Senha"
                        placeholder="••••••" />
                </div>

                <div class="block mt-4">
                    <x-checkbox wire:model.defer="remember_me" label="Manter conectado" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            Esqueci minha senha
                        </a>
                    @endif

                    <x-button wire:click="submit" class="ml-3" label="Entrar" spinner="save" primary />
                </div>
            </form>
        </div>

    </div>
</div>
