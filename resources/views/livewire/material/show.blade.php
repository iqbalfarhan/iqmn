<div class="page-wrapper">
    <div class="flex gap-4 justify-between">
        <div>
            <h3 class="text-3xl font-bold">{{ $material->title }}</h3>
        </div>
        <div class="flex gap-1">

        </div>
    </div>


    <article class="prose prose-lg mx-auto">

        <div class="flex gap-2">
            <a href="{{ $material->url }}" class="btn" target="_blank">
                <x-tabler-external-link class="w-5 h-5" />
                <span>Buka materi</span>
            </a>
            <button class="btn normal-case" wire:click.prevent="attachMaterial">
                @if ($mine)
                    <x-tabler-pin-filled class="w-5 h-5 text-error" />
                @else
                    <x-tabler-pin class="w-5 h-5 text-error" />
                @endif

                @if ($material->users->count() == 0)
                    <span>Belum ada yang pin</span>
                @else
                    <span>sudah di pin {{ $material->users->count() }} orang</span>
                @endif
            </button>
            @can('material.quiz')
                @if ($material->quizzes->count() != 0)
                    <a href="{{ route('material.quiz', $material->id) }}" class="btn normal-case">
                        <x-tabler-pencil-question class="w-5 h-5" />
                        <span>Kerjakan quiz ({{ $material->quizzes->count() }})</span>
                    </a>
                @endif
            @endcan
            @can('material.edit')
                <a href="{{ route('material.edit', $material->id) }}" class="btn">
                    <x-tabler-edit class="size-5" />
                    <span>Edit</span>
                </a>
            @endcan
            <span wire:loading>
                <div class="btn btn-ghost">
                    <div class="loading loading-xs"></div>
                </div>
            </span>
        </div>

        <figure>
            <img src="{{ $material->image_url }}" alt="" class="w-full rounded-xl">
        </figure>
        {!! Str::markdown($material->description) !!}

        @if ($material->tags)
            <div class="flex flex-wrap gap-1">
                @foreach ($material->tags as $tag)
                    <button class="btn btn-xs">
                        <x-tabler-tag class="w-4 h-4" />
                        <span>{{ $tag }}</span>
                    </button>
                @endforeach
            </div>
        @endif
    </article>

    <div class="divider"></div>

    <div class="space-y-6 w-full">
        @foreach ($discussions as $dsc)
            @livewire('partial.chat', ['discussion' => $dsc], key($dsc->id))
        @endforeach
        <label for="addDiscussion" class="btn self-center">
            <x-tabler-edit class="w-5 h-5" />
            <span>Tulis Diskusi</span>
        </label>
    </div>

    @livewire('material.addchat', ['material' => $material])
</div>
