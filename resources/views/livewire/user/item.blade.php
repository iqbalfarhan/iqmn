<div class="card card-compact bg-base-200">
    <div class="card-body">
        <div class="flex flex-1 gap-3">
            <div class="avatar">
                <div class="size-12 rounded-full">
                    <img src="{{ $user->image_url }}" alt="">
                </div>
            </div>
            <div class="flex flex-col">
                <div class="line-clamp-1 font-bold text-lg">{{ $user->name }}</div>
                <div class="line-clamp-1 text-sm">{{ $user->email }}</div>
            </div>
        </div>
    </div>
</div>
