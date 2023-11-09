<div class="space-y-6">
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
            <button class="btn" wire:click.prevent="attachMaterial">
                @if ($mine)
                    <x-tabler-heart-filled class="w-5 h-5 text-error" />
                    <span>lepas</span>
                @else
                    <x-tabler-heart class="w-5 h-5 text-error" />
                    <span>comot</span>
                @endif
            </button>
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
