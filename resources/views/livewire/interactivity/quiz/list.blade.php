<div>
    <x-slot name="title">Quizzes</x-slot>

    @if (session('success'))
        <x-success message="{{ session('success') }}" />
    @endif

    <div class="list-header">
        <div class="button">
            <x-button href="{{ route('admin.interactivity.quizzes.create') }}" primary label="Criar novo"
                icon="plus" />
        </div>
        <div class="search">
            <x-input wire:model="search" icon="search" placeholder="Buscar pergunta" class="w-full" />
        </div>
    </div>

    <div class="bg-white rounded shadow">
        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th class="left">Pergunta</th>
                        <th class="left">Categoria</th>
                        <th class="left">
                            <div class="flex items-center space-x-2">
                                <span>Tipo</span>
                                <x-dropdown class="font-normal normal-case">
                                    <x-dropdown.item wire:click="filterType('')" label="Todos" />
                                    <x-dropdown.item wire:click="filterType('test')" label="Teste" />
                                    <x-dropdown.item wire:click="filterType('survey')" label="Enquete" />
                                </x-dropdown>
                            </div>
                        </th>
                        <th><x-icon name="cursor-click" class="w-4 h-4" /></th>
                        <th class="left">
                            <div class="flex items-center space-x-2">
                                <span>Status</span>
                                <x-dropdown class="font-normal normal-case">
                                    <x-dropdown.item wire:click="filterStatus('')" label="Todos" />
                                    <x-dropdown.item wire:click="filterStatus(1)" label="Ativos" />
                                    <x-dropdown.item wire:click="filterStatus('false')" label="Inativos" />
                                </x-dropdown>
                            </div>
                        </th>
                        <th class="center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($quizzes as $quiz)
                        <tr>
                            <td>{{ $quiz->question }}</td>
                            <td>{{ $quiz->category->title }}</td>
                            <td>{{ $quiz->type }}</td>
                            <td class="text-center">{{ $quiz->records_count }}</td>
                            <td class="text-left">
                                <span @class([
                                    'py-0.5 px-2 rounded-full text-xs',
                                    'bg-green-200 text-green-900' => $quiz->active,
                                    'bg-red-200 text-red-900' => !$quiz->active,
                                ])>
                                    {{ $quiz->active ? 'Ativo' : 'Inativo' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="flex item-center justify-center">
                                    <x-button href="{{ route('admin.interactivity.quizzes.edit', $quiz) }}" flat rounded sm icon="pencil" class="px-1 py-2.5" />
                                    <x-button wire:click="deleteOne({{ $quiz->id }})" flat rounded negative sm icon="trash" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Nenhum quiz encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-6 py-2">
                {{ $quizzes->links() }}
            </div>
        </div>
    </div>
</div>
