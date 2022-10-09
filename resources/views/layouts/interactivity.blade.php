<x-app-layout>
    <x-dialog />
    <x-slot name="header">{{ $title ?? 'Interatividade'}}</x-slot>
    <x-slot name="nav">
        <div class="bg-white">
            <nav class="flex flex-col sm:flex-row">
                <x-tab-link :href="route('admin.interactivity.informatives.list')" :active="request()->routeIs('admin.interactivity.informatives*')" label="Informativos" />
                <x-tab-link :href="route('admin.interactivity.news.list')" :active="request()->routeIs('admin.interactivity.news*')" label="Notícias" />
                <x-tab-link href="#" label="Campeonatos" />
                <x-tab-link :href="route('admin.interactivity.quizzes.list')" :active="request()->routeIs('admin.interactivity.quizzes*')" label="Quizes" />
            </nav>
        </div>
    </x-slot>
    {{-- <div class="">
        <div>
            <x-form-nav-link :href="route('admin.interactivity.informatives.list')" :active="request()->routeIs('admin.interactivity.informatives*')" label="Informativos" />
            <x-form-nav-link :href="route('admin.interactivity.news.list')" :active="request()->routeIs('admin.interactivity.news*')" label="Notícias" />
            <x-form-nav-link href="#" label="Campeonatos" />
            <x-form-nav-link :href="route('admin.interactivity.quizzes.list')" :active="request()->routeIs('admin.interactivity.quizzes*')" label="Quizes" />
        </div>
        <div class="sm:col-span-3 md:col-span-5 max-w-sm md:max-w-full">
        </div>
    </div> --}}
    {{ $slot }}
</x-app-layout>