<x-app-layout>
    <x-slot name="header">Relatórios</x-slot>
    <x-dialog />

    <div class="sb-form">
        <div class="sb-sidebar">
            <x-form-nav-link href="{{ route('admin.records') }}" active="{{ !$secao }}" label="Básico" />
            <x-form-nav-link href="{{ route('admin.records', 'empresas') }}" active="{{ $secao === 'empresas' }}" label="Empresas" />
            <x-form-nav-link href="{{ route('admin.records', 'motoristas') }}" active="{{ $secao === 'motoristas' }}" label="Motoristas" />
        </div>
        <div class="sb-container">

            @if (!$secao)
                <p>exibir cards de resumo</p>
            @endif
            @if ($secao === 'empresas')
                
            @endif
            @if ($secao === 'motoristas')
                @livewire('admin.record.record-driver-list')
            @endif
        </div>
    </div>
</x-app-layout>
