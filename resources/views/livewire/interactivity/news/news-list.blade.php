<div>
    <x-slot name="title">Notícias</x-slot>

    @if (session('success'))
        <x-success message="{{ session('success') }}" />
    @endif

    <div class="flex justify-between mb-4">
        <x-button href="{{ route('admin.interactivity.news.create') }}" sm primary label="Cadastrar nova" />
        <x-button sm white label="Remover antigas" />
    </div>
    <div class="bg-white rounded shadow">
        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr class="text-left">
                        <th class="w-32"></th>
                        <th>Título</th>
                        <th>Categoria</th>
                        <th>Data</th>
                        <th>Fonte</th>
                        <th><x-icon name="eye" class="w-4 h-4" /></th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $news)
                        <tr>
                            <td>
                                <img src="{{ $news->thumbnail->path }}" class="w-full">
                            </td>
                            <td class="w-96 break-words">{{ $news->title }}</td>
                            <td>{{ $news->category->title }}</td>
                            <td>{{ $news->date }}</td>
                            <td>{{ $news->source }}</td>
                            <td class="text-center">{{ $news->accesses_count }}</td>
                            <td class="flex item-center justify-center">
                                <x-button href="{{ route('admin.interactivity.news.edit', $news) }}" flat rounded sm icon="pencil" class="px-1 py-2.5" />
                                <x-button wire:click="deleteOne({{ $news->id }})" flat rounded sm negative icon="trash" class="px-1 py-2.5" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
