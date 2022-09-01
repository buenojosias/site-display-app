<x-app-layout>
    <x-dialog />
    <x-slot name="header">{{ $title ?? 'Interatividade'}}</x-slot>
    <div class="grid grid-cols-6 gap-6">
        <div>
            <x-form-nav-link :href="route('admin.interactivity.informatives.list')" :active="request()->routeIs('admin.interactivity.informatives*')" label="Informativos" />
            <x-form-nav-link :href="route('admin.interactivity.news.list')" :active="request()->routeIs('admin.interactivity.news*')" label="Notícias" />
            <x-form-nav-link href="#" label="Campeonatos" />
            <x-form-nav-link href="#" label="Quizes" />
        </div>
        <div class="col-span-5">
            {{ $slot }}
        </div>
    </div>
</x-app-layout>