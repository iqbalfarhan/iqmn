<div class="card bg-base-200 shadow">
    <div class="card-body items-center space-y-4">
        <div class="avatar">
            <div class="w-24 rounded-full bg-neutral text-neutral-content text-xl">
                <img src="{{ $group->image_url }}" alt="">
            </div>
        </div>
        <div class="flex flex-col items-center text-sm">
            <h3 class="card-title">{{ $group->name }}</h3>
            <span>{{ $group->users->count() }} members</span>
        </div>
    </div>
</div>
