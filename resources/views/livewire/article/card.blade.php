<div class="card card-side card-compact w-full bg-base-200 overflow-hidden items-center">
    <div class="card-body">
        <div class="flex gap-3">
            <img src="{{ $post->image_url }}" alt="" class="h-16 aspect-video rounded-lg">
            <div class="flex flex-1 justify-between flex-col">
                <div class="line-clamp-2">{{ $post->title }}</div>
                <div class="text-xs opacity-75">{{ $post->group?->name ?? $post->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
</div>
