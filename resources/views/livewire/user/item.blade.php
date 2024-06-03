<div class="card card-compact bg-base-200 overflow-hidden">
    <div class="card-body">
        <div class="flex gap-3">
            <div class="avatar flex-none">
                <div class="size-12 rounded-full">
                    <img src="{{ $user->image_url }}" alt="">
                </div>
            </div>
            <div class="flex flex-col flex-1">
                <div class="line-clamp-1 font-bold text-lg">{{ $user->name }}</div>
                <div class="line-clamp-1 text-sm">{{ $user->email }}</div>
            </div>
        </div>
    </div>
</div>
