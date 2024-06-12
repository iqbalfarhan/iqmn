<div class="page-wrapper">
    <article class="prose prose-lg mx-auto">
        <h3 class="text-3xl font-bold">{{ $post->title }}</h3>
        <figure>
            <img src="{{ $post->image_url }}" alt="" class="w-full rounded-xl">
        </figure>
        <div class="flex items-center opacity-75">
            <div class="flex gap-2 flex-1">
                <div class="avatar size-5">
                    <div class="w-5 rounded-full bg-base-300">
                        <img src="{{ $post->user->image_url }}" alt="A">
                    </div>
                </div>
                <div class="text-sm">{{ $post->user->name }}</div>
            </div>
            <div class="text-xs">{{ $post->created_at->format('d M Y') }}</div>
        </div>
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
