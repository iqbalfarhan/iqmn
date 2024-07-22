<div class="page-wrapper">
    <div class="flex justify-between items-center">
        <span>{{ $quizzes->count() }} Pertanyaan</span>
        <button wire:click="dispatch('createQuiz', {'material_id' : {{ $ujian->id }}, 'model' : 'ujian'})"
            class="btn btn-primary">
            <x-tabler-circle-plus class="w-5 h-5" />
            <span>Tambah</span>
        </button>
    </div>
    <div class="flex flex-col gap-2">
        @forelse ($quizzes as $quiz)
            <div class="card bg-base-200 group" wire:key='{{ $quiz->id }}'>
                <div class="card-body space-y-4">
                    <div class="flex justify-between gap-4">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold">
                                {{ $quiz->question }}
                            </h3>
                        </div>
                        <div class="flex opacity-0 group-hover:opacity-100 space-x-1">
                            <button wire:click="dispatch('updateQuiz', [{{ $quiz->id }}])"
                                class="btn btn-sm btn-square btn-ghost">
                                <x-tabler-edit class="w-5 h-5" />
                            </button>
                            <button wire:click="dispatch('updateQuiz', [{{ $quiz->id }}])"
                                class="btn btn-sm btn-square btn-ghost">
                                <x-tabler-trash class="w-5 h-5" />
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col gap-1">
                        @foreach ($quiz->option_lists as $point => $list)
                            <span @class(['', 'text-primary' => $point == $quiz->answer])>{{ $point }}. {{ $list }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        @empty
            @livewire('partial.nocontent')
        @endforelse
    </div>
    @livewire('quiz.form')
</div>
