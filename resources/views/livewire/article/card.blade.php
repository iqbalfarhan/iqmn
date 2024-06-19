<div class="card card-side card-compact w-full bg-base-200 overflow-hidden items-center">
    <div class="card-body">
        <div class="flex gap-3">
            <div class="avatar size-16">
                <div class="size-16 rounded-lg">
                    <img src="{{ $post->image_url }}" alt="">
                </div>
            </div>
            <div class="flex flex-1 justify-between flex-col">
                <div class="line-clamp-2">{{ $post->title }}</div>
                <div class="text-xs opacity-75">{{ $post->group?->name ?? $post->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
</div>
