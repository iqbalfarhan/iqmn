<div class="card card-compact bg-base-200">
    <div class="card-body">
        <div class="flex gap-3">
            <div class="avatar placeholder size-16">
                <div class="size-16 rounded-lg bg-base-100">
                    <span>
                        <x-tabler-file-pencil class="size-6" />
                    </span>
                </div>
            </div>
            <div class="flex flex-1 justify-between flex-col">
                <div class="line-clamp-2">{{ $ujian->title }}</div>
                <div class="text-xs opacity-75">{{ $ujian->group?->name ?? $ujian->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
</div>
