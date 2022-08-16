<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="mt-4">
                <x-input label="E-mail" icon="user" type="email" name="email" placeholder="admin@email.com" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-input label="Senha" icon="lock-closed" type="password" name="password" placeholder="••••••" :value="old('password')" required autocomplete="current-password" />
            </div>

            <div class="mt-4">
                <x-checkbox label="Manter conectado" id="remember_me" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">Esqueci minha senha</a>
                <x-button label="Entrar" primary type="submit" class="ml-3" />
            </div>
            
        </form>
    </x-auth-card>
</x-guest-layout>
