<div>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th class="left">Título</th>
                    <th class="center">Criação</th>
                    <th class="center">Expiração</th>
                    <th class="center">Exibições</th>
                    <th class="center">Status</th>
                    <th class="center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($advertisings as $advertising)
                    <tr>
                        <td>{{ $advertising->title }}</td>
                        <td class="text-center">{{ $advertising->created_at->format('d/m/Y') }}</td>
                        <td class="text-center">{{ $advertising->expires_at ? $advertising->expires_at : 'Indeterminada' }}</td>
                        <td class="text-center">{{ $advertising->displays_count }}</td>
                        <td class="text-center">
                            <span @class([
                                'py-0.5 px-2 rounded-full text-xs',
                                'bg-green-200 text-green-900' => $advertising->active,
                                'bg-red-200 text-red-900' => !$advertising->active,
                            ])>
                                {{ $advertising->active ? 'Ativa' : 'Inativa' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="flex item-center justify-center">
                                <x-button href="{{ route('admin.advertisings.show', $advertising) }}" flat rounded icon="eye" class="px-1 py-1" />
                                <x-button flat rounded icon="pencil" class="px-1 py-1" />
                                <x-button href="{{ route('admin.advertisings.displays', $advertising) }}" flat rounded icon="chart-bar" class="px-1 py-1" />
                            </div>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="6">Nenhuma campanha encontrada.</td>
                </tr>
                @endforelse
            </tbody>
            
        </table>
    </div>

</div>
