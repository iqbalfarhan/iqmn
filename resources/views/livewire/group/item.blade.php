<div class="card card-compact bg-base-200">
    <div class="card-body">
        <div class="flex gap-3 items-center">
            <div class="flex-none">
                <div class="avatar size-14 placeholder">
                    <div class="w-14 bg-base-100 text-lg rounded-lg">
                        @if ($group->logo)
                            <img src="{{ $group->image_url }}" alt="">
                        @else
                            <span class="capitalize">{{ $group->name[0] }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="flex flex-col h-full flex-1 justify-between">
                <div class="text-lg line-clamp-1">{{ $group->name }}</div>
                <div class="text-xs opacity-75 line-clamp-2">
                    {{ Str::limit($group->desc, 60) }}
                </div>
            </div>
        </div>
    </div>
</div>
