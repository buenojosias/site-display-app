<x-app-layout>
    <x-dialog />
    <x-slot name="header">{{ $title ?? 'Interatividade'}}</x-slot>
    <div class="grid sm:grid-cols-4 md:grid-cols-6 gap-6">
        <div>
            <x-form-nav-link :href="route('admin.interactivity.informatives.list')" :active="request()->routeIs('admin.interactivity.informatives*')" label="Informativos" />
            <x-form-nav-link :href="route('admin.interactivity.news.list')" :active="request()->routeIs('admin.interactivity.news*')" label="Notícias" />
            <x-form-nav-link href="#" label="Campeonatos" />
            <x-form-nav-link :href="route('admin.interactivity.quizzes.list')" :active="request()->routeIs('admin.interactivity.quizzes*')" label="Quizes" />
        </div>
        <div class="sm:col-span-3 md:col-span-5 max-w-sm md:max-w-full">
            {{ $slot }}
        </div>
    </div>
</x-app-layout>