<div class="card image-full bg-base-200 h-48 z-0">
    <figure>
        <img src="{{ $group->image_url }}" alt="" class="bg-cover w-full">
    </figure>
    <div class="card-body z-0">
        <div class="flex flex-col h-full">
            <div class="flex-1">
                <div class="avatar size-10 placeholder">
                    <div class="w-10 bg-primary text-lg rounded-box">
                        <span class="capitalize font-bold text-primary-content">{{ $group->name[0] }}</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col flex-none justify-between">
                <div class="text-lg line-clamp-1">{{ $group->name }}</div>
                <div class="text-xs opacity-75 line-clamp-2">
                    {{ Str::limit($group->desc, 60) }}
                </div>
            </div>
        </div>
    </div>
</div>
