<div class="card card-compact bg-base-200 shadow">
    <div class="card-body">
        <div class="flex gap-3 items-center">
            <div class="avatar size-12 flex-none placeholder">
                <div class="w-12 rounded-full bg-base-100 text-lg">
                    <span class="capitalize">{{ $group->name[0] }}</span>
                </div>
            </div>

            <div class="flex flex-col flex-1">
                <div class="flex flex-col flex-1">
                    <a href="{{ route('group.show', $group) }}"
                        class="text-lg font-bold line-clamp-1">{{ $group->name }}</a>
                    <span>{{ $group->users->count() }} members</span>
                </div>
            </div>

            @if ($showToggleJoin)
                <div class="flex-none">
                    @if ($join)
                        <button class="btn btn-error btn-sm" wire:click="unJoinGroup">
                            <x-tabler-logout class="size-4" />
                            <span class="hidden md:flex">Leave</span>
                        </button>
                    @else
                        <button class="btn btn-primary btn-sm" wire:click="joinGroup">
                            <x-tabler-login class="size-4" />
                            <span class="hidden md:flex">Join</span>
                        </button>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
