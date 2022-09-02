<div>
    <x-slot name="title">Quizzes</x-slot>

    @if (session('success'))
        <x-success message="{{ session('success') }}" />
    @endif

    <div class="flex justify-between mb-4">
        <x-button href="{{ route('admin.interactivity.quizzes.create') }}" sm primary label="Criar novo" />
    </div>
    <div class="bg-white rounded shadow">
        <div class="table-wrapper">

        </div>
    </div>
</div>
