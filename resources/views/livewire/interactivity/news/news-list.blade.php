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
                            <td>
                                <x-button wire:click="deleteOne({{ $news->id }})" flat negative sm icon="trash" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
