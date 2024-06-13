<div class="card card-compact bg-base-200 shadow">
    <div class="card-body">
        <div class="flex gap-3 items-center">
            <div class="flex-none">
                <div class="avatar size-14 placeholder">
                    <div class="w-14 bg-base-100 text-lg rounded-lg">
                        @if ($group->logo)
                            <img src="{{ $group->logo }}" alt="">
                        @else
                            <span class="capitalize">{{ $group->name[0] }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="flex flex-col h-full flex-1 justify-between">
                <div class="text-lg">{{ $group->name }}</div>
                <div class="text-xs opacity-75 line-clamp-2">
                    {{ $group->materials->count() }} material
                    {{ $group->desc }}
                </div>
            </div>
        </div>
    </div>
</div>
