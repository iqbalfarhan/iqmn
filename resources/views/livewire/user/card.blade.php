<div class="card bg-base-200">
    <div class="card-body space-y-4">
        <div class="flex items-center gap-6">
            <div class="avatar">
                <div class="w-16 rounded-full">
                    <img src="{{ $user->image_url }}" alt="">
                </div>
            </div>
            <div class="flex flex-1 flex-col text-sm">
                <div class="font-semibold text-xl">{{ $user->name }}</div>
                <div>{{ $user->email }}</div>
                <div>{{ $user->getRoleNames()->first() }}</div>
            </div>
        </div>
        <div class="card-actions justify-end">
            <button class="btn btn-sm btn-success" wire:click="$dispatch('editUser', {user: {{ $user->id }}})">
                <x-tabler-edit class="size-4" />
                <span>Edit user</span>
            </button>
        </div>
    </div>
</div>
