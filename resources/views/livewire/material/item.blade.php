<div class="card card-side card-compact w-full bg-base-200 overflow-hidden items-center">
    <div class="card-body">
        <div class="flex gap-3">
            <div class="avatar size-16">
                <div class="size-16 rounded-lg">
                    <img src="{{ $material->image_url }}" alt="">
                </div>
            </div>
            <div class="flex flex-1 justify-between flex-col">
                <div class="line-clamp-2">{{ $material->title }}</div>
                <div class="text-xs opacity-75">{{ $material->group?->name ?? $material->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
</div>
