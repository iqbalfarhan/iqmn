<div class="card bg-base-200">
    <div class="card-body">
        <div class="flex justify-center gap-4 items-center">
            @if ($tugas->attachment)
                <div class="avatar">
                    <div class="w-12 rounded-box bg-base-100">
                        <img src="{{ $tugas->image ?? '' }}" alt="">
                    </div>
                </div>
            @endif
            <div class="flex flex-1 flex-col">
                <h3 class="card-title">{{ $tugas->title }}</h3>
                <p>{{ $tugas->body }}</p>
            </div>
            <div class="card-actions">
                <button class="btn btn-square btn-active btn-sm">
                    <x-tabler-chevron-right class="size-5" />
                </button>
                <button class="btn btn-square btn-active btn-sm">
                    <x-tabler-pencil class="size-5" />
                </button>
                <button class="btn btn-square btn-active btn-sm">
                    <x-tabler-trash class="size-5" />
                </button>
            </div>
        </div>
    </div>
</div>
