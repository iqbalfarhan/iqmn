<div class="card card-side card-compact w-full bg-base-200 overflow-hidden items-center">
    <div class="avatar size-24">
        <div class="size-24">
            <img src="{{ $material->image_url }}" alt="">
        </div>
    </div>
    <div class="card-body">
        <div class="line-clamp-2">
            {{ $material->title }}
        </div>
        <div class="text-xs">{{ $material->group?->name ?? $material->created_at->diffForHumans() }}</div>
    </div>
</div>
