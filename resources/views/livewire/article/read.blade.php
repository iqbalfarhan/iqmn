<div class="page-wrapper max-w-7xl py-10">
    <div class="flex flex-col md:flex-row gap-10">
        <article class="prose prose-lg flex-none">
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
        @if ($terkaits)
            <div class="flex flex-col gap-6 flex-1">
                <h3 class="font-bold text-lg">Article terkait :</h3>
                <div class="flex flex-col gap-2 w-full">
                    @foreach ($terkaits as $terkait)
                        <a href="{{ route('article.show', ['slug' => $terkait->slug]) }}" wire:navigate class="w-full">
                            @livewire('article.card', ['post' => $terkait])
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
