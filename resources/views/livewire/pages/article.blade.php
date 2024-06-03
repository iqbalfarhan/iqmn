<div class="page-wrapper py-20">
    <article class="prose prose-lg mx-auto">
        <div class="text-4xl font-black text-center w-full text-primary">{{ config('app.name') }}</div>
        <figure>
            <img src="{{ $post->image_url }}" alt="" class="w-full rounded-xl">
        </figure>
        <div class="flex mb-6">
            @if ($post->tags)
                <div class="flex flex-wrap gap-1">
                    @foreach ($post->tags as $tag)
                        <button class="btn btn-xs">
                            <x-tabler-tag class="w-4 h-4" />
                            <span>{{ $tag }}</span>
                        </button>
                    @endforeach
                </div>
            @endif
        </div>
        {!! Str::markdown($post->body) !!}
    </article>
</div>
