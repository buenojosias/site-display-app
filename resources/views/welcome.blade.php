<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>{{ config('app.name', 'Euvee Mídia') }}</title>
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('build/assets/public.1a94946b.css') }}">
    <script src="{{ asset('build/assets/public.f7f4542e.js') }}" defer></script>
    {{-- @vite(['resources/css/public.css', 'resources/js/public.js']) --}}
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="antialiased">
    <div class="min-h-screen bg-gray-300">

        <div class="relative overflow-hidden bg-white">
            <div class="mx-auto max-w-7xl">
                <div class="relative z-10 bg-white pb-8 sm:pb-16 md:pb-20 lg:w-full lg:max-w-2xl lg:pb-28 xl:pb-32">
                    <svg class="absolute inset-y-0 right-0 hidden h-full w-48 translate-x-1/2 transform text-white lg:block"
                        fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                        <polygon points="50,0 100,0 50,100 0,100" />
                    </svg>

                    <div x-data="{ menu: false }">
                        <div class="relative px-4 pt-6 sm:px-6 lg:px-8">
                            <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start"
                                aria-label="Global">
                                <div class="flex flex-shrink-0 flex-grow items-center lg:flex-grow-0">
                                    <div class="flex w-full items-center justify-between md:w-auto">
                                        <a href="#">
                                            <span class="sr-only">Euvee Mídia</span>
                                            <img alt="Euvee Mídia" class="h-8 w-auto sm:h-10"
                                                src="{{ asset('img/logo-sb.png') }}">
                                        </a>
                                        <div class="-mr-2 flex items-center md:hidden">
                                            <button type="button" @click="menu = !menu"
                                                class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                                aria-expanded="false">
                                                <span class="sr-only">Open main menu</span>
                                                <!-- Heroicon name: outline/bars-3 -->
                                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden md:ml-10 md:block md:space-x-8 md:pr-4">
                                    <a href="#"
                                        class="font-medium text-gray-500 hover:text-gray-900">Marketplace</a>
                                    <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Conteúdo</a>
                                    <a href="#" class="font-medium text-primary-600 hover:text-primary-500">Log
                                        in</a>
                                </div>
                            </nav>
                        </div>

                        <div x-show="menu" x-cloak @click.away="menu = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-90"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute inset-x-0 top-0 z-10 origin-top-right transform p-2 transition md:hidden">
                            <div class="overflow-hidden rounded-lg bg-white shadow-md ring-1 ring-black ring-opacity-5">
                                <div class="flex items-center justify-between px-5 pt-4">
                                    <div>
                                        <img class="h-8 w-auto" src="{{ asset('img/logo-sb.png') }}" alt="">
                                    </div>
                                    <div class="-mr-2">
                                        <button type="button" @click="menu = false"
                                            class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                            <span class="sr-only">Close main menu</span>
                                            <!-- Heroicon name: outline/x-mark -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="space-y-1 px-2 pt-2 pb-3">
                                    <a href="#"
                                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">Product</a>
                                    <a href="#"
                                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">Conteúdo</a>
                                </div>
                                <a href="#"
                                    class="block w-full bg-gray-50 px-5 py-3 text-center font-medium text-indigo-600 hover:bg-gray-100">Log
                                    in</a>
                            </div>
                        </div>
                    </div>

                    <main class="mx-auto mt-10 max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                        <div class="sm:text-center lg:text-left">
                            <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl md:text-5xl">
                                <span class="block xl:inline">Divulgue sua marca para</span>
                                <span class="block text-primary-600 xl:inline">centenas de usuários diários</span>
                            </h1>
                            <p
                                class="mt-3 text-base text-gray-500 sm:mx-auto sm:mt-5 sm:max-w-xl sm:text-lg md:mt-5 md:text-xl lg:mx-0">
                                Um texto chamativo aqui...</p>
                            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                                <div class="rounded-md shadow">
                                    <a href="#"
                                        class="flex w-full items-center justify-center rounded-md border border-transparent bg-primary-500 px-8 py-3 text-base font-medium text-white duration-300 transform hover:bg-primary-700 md:py-4 md:px-10 md:text-lg">CTA</a>
                                </div>
                                <div class="mt-3 sm:mt-0 sm:ml-3">
                                    <a href="#"
                                        class="flex w-full items-center justify-center rounded-md border border-transparent bg-primary-100 px-8 py-3 text-base font-medium text-white duration-300 transform hover:bg-primary-200 md:py-4 md:px-10 md:text-lg">Outro
                                        CTA</a>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
            <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:h-full lg:w-full"
                    src="{{ asset('img/552e962c6bb3f7f7075d3540.webp') }}?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80"
                    alt="">
            </div>
        </div>

        blablabla

        <section class="bg-white">
            <div class="container grid grid-cols-1 gap-8 px-4 py-12 mx-auto lg:grid-cols-2">
                <div class="flex flex-col items-center max-w-lg mx-auto text-center">
                    <h2 class="text-3xl font-semibold tracking-tight text-gray-800 dark:text-white">Empresas</h2>
                    <p class="mt-3 text-gray-500 dark:text-gray-300">
                        Divulgue seus produtos e serviços para dezenas de usuários por dia, dependendo da quantidade de
                        veículos escolhida.<br>
                        Os anúncios são feitos em forma de vídeo.
                    </p>
                    <a href="#"
                        class="inline-flex items-center justify-center w-full px-5 py-2 mt-6 text-white bg-primary-600 rounded-lg sm:w-auto hover:bg-primary-500 focus:ring focus:ring-primary-300 focus:ring-opacity-80">CTA</a>
                </div>

                <div class="flex flex-col items-center max-w-lg mx-auto text-center">
                    <h2 class="text-3xl font-semibold tracking-tight text-gray-800 dark:text-white">Motoristas</h2>
                    <p class="mt-3 text-gray-500 dark:text-gray-300">
                        Ganhe uma renda extra divulgando as empresas parceiras.
                    </p>
                    <a href="#"
                        class="inline-flex items-center justify-center w-full px-5 py-2 mt-6 text-gray-700 transition-colors duration-150 transform bg-white border border-gray-200 rounded-lg dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-100 dark:text-white sm:w-auto dark:hover:bg-gray-800 dark:ring-gray-700 focus:ring focus:ring-gray-200 focus:ring-opacity-80">CTA</a>
                </div>
            </div>
        </section>

        <section class="bg-gray-300 lg:py-12 lg:flex lg:justify-center">
            <div class="bg-white dark:bg-gray-800 lg:mx-8 lg:flex lg:max-w-5xl lg:shadow-lg lg:rounded-lg">
                <div class="lg:w-1/2">
                    <div class="h-64 bg-cover lg:rounded-lg lg:h-full"
                        style="background-image:url('{{ asset('img/grafics.jpg') }}')">
                    </div>
                </div>

                <div class="max-w-xl px-6 py-12 lg:max-w-5xl lg:w-1/2">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white md:text-3xl">Relatórios</h2>
                    <p class="mt-4 text-gray-600 dark:text-gray-400">Tanto as empresas quanto os motoristas têm acesso
                        a relatório de exibições dos anúncios, incluindo data, hora e geolocalização.</p>

                    <div class="mt-8">
                        <a href="#"
                            class="px-5 py-2 font-semibold text-gray-100 transition-colors duration-300 transform bg-primary-700 rounded-md hover:bg-primary-500">Faça
                            uma cotação</a>
                    </div>
                </div>
            </div>
        </section>

        <div class="bg-white py-12">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-lg font-semibold text-indigo-600">Conteúdos</h2>
                    <p class="mt-2 text-3xl font-bold leading-8 tracking-tight text-gray-900 sm:text-4xl">
                        O que exibimos para os passageiros
                    </p>
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                        Para garantir uma maior taxa de visualizações dos anúncios, ...
                    </p>
                </div>
                <div class="mt-10">
                    <dl class="space-y-10 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10 md:space-y-0">
                        <div class="relative">
                            <dt>
                                <div
                                    class="absolute flex h-12 w-12 items-center justify-center rounded-md bg-primary-500 text-white">
                                    <!-- Heroicon name: outline/globe-alt -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                    </svg>

                                </div>
                                <p class="ml-16 text-lg font-medium leading-6 text-gray-900">Notícias</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">Mais informações sobre exibições de
                                notícia...</dd>
                        </div>
                        <div class="relative">
                            <dt>
                                <div
                                    class="absolute flex h-12 w-12 items-center justify-center rounded-md bg-primary-500 text-white">
                                    <!-- Heroicon name: outline/scale -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                    </svg>
                                </div>
                                <p class="ml-16 text-lg font-medium leading-6 text-gray-900">Informativos</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">Mais informações sobre exibições de informativos...</dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <div
                                    class="absolute flex h-12 w-12 items-center justify-center rounded-md bg-primary-500 text-white">
                                    <!-- Heroicon name: outline/bolt -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                    </svg>
                                </div>
                                <p class="ml-16 text-lg font-medium leading-6 text-gray-900">Quizzes e enquetes</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">Mais informações sobre as enquetes...</dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <div
                                    class="absolute flex h-12 w-12 items-center justify-center rounded-md bg-primary-500 text-white">
                                    <!-- Heroicon name: outline/bolt -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                                    </svg>
                                </div>
                                <p class="ml-16 text-lg font-medium leading-6 text-gray-900">Vagas de emprego</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">Mais informações sobre vagas de empregos...
                            </dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <div
                                    class="absolute flex h-12 w-12 items-center justify-center rounded-md bg-primary-500 text-white">
                                    <!-- Heroicon name: outline/chat-bubble-bottom-center-text -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 15a4.5 4.5 0 004.5 4.5H18a3.75 3.75 0 001.332-7.257 3 3 0 00-3.758-3.848 5.25 5.25 0 00-10.233 2.33A4.502 4.502 0 002.25 15z" />
                                    </svg>
                                </div>
                                <p class="ml-16 text-lg font-medium leading-6 text-gray-900">Informações climáticas</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-base text-gray-500">Mais informações sobre informações
                                climáticas...</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
