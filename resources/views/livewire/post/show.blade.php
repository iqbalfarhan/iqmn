<div class="page-wrapper">
    <article class="prose prose-lg mx-auto">
        <h1>{{ $post->title }}</h1>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2 flex-1">
                <img src="{{ $post->user->image_url }}" alt="A" class="size-6 rounded-full m-0">
                <div class="text-sm">{{ $post->user->name }}</div>
            </div>
            <div class="text-xs">{{ $post->created_at->format('d M Y') }}</div>
        </div>
        <figure>
            <img src="{{ $post->image_url }}" alt="" class="w-full rounded-xl">
        </figure>
        <div class="flex mb-6">
            @if ($post->tags)
                <div class="flex flex-wrap gap-1">
                    @foreach ($post->tags as $tag)
                        <a href="{{ route('article.index', ['q' => $tag]) }}" class="btn btn-xs" wire:navigate>
                            <x-tabler-tag class="w-4 h-4" />
                            <span>{{ $tag }}</span>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
        {!! Str::markdown($post->body) !!}
    </article>
</div>
