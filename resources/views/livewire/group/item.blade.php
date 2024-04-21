<div class="card card-compact bg-base-200 shadow">
    <div class="card-body">
        <div class="flex gap-3 items-center">
            <div class="avatar size-12">
                <div class="w-12 rounded-full bg-neutral text-neutral-content text-xl">
                    <img src="{{ $group->image_url }}" alt="">
                </div>
            </div>
            <div class="flex flex-col md:flex-row flex-1 gap-3 items-center">
                <div class="flex flex-col flex-1">
                    <a href="{{ route('group.show', $group) }}"
                        class="text-lg font-bold line-clamp-1">{{ $group->name }}</a>
                    <span>{{ $group->users->count() }} members</span>
                </div>
                <div>
                    @if ($join)
                        <button class="btn btn-error btn-sm" wire:click="unJoinGroup">
                            <x-tabler-logout class="size-4" />
                            <span>Leave</span>
                        </button>
                    @else
                        <button class="btn btn-primary btn-sm" wire:click="joinGroup">
                            <x-tabler-login class="size-4" />
                            <span>Join</span>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
