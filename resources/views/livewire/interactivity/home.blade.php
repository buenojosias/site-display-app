<div>

    <div class="w-full grid sm:grid-cols-2 md:grid-cols-3 gap-2">

        <div class="w-full">
            <div class="w-full p-4 rounded bg-white border border-gray-100">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">Informativos ativos</div>
                        <div class="text-xl font-bold">{{ $informativesCount }}</div>
                    </div>
                    {{-- svg icon here 24px --}}
                </div>
            </div>
        </div>

        <div class="w-full">
            <div class="w-full p-4 rounded bg-white border border-gray-100">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">Notícias ativas</div>
                        <div class="text-xl font-bold">{{ $newsCount }}</div>
                    </div>
                    {{-- svg icon here 24px --}}
                </div>
            </div>
        </div>

        <div class="w-full">
            <div class="w-full p-4 rounded bg-white border border-gray-100">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs uppercase font-light text-gray-500">Quizzes</div>
                        <div class="text-xl font-bold">{{ $quizzesCount }}</div>
                    </div>
                    {{-- svg icon here 24px --}}
                </div>
            </div>
        </div>
    </div>
    
</div>
