<div class="page-wrapper">
    <article class="prose prose-lg mx-auto">
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
</div>
