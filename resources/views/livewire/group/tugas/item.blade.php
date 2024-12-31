<div class="card bg-base-200">
    <div class="card-body">
        <div class="flex justify-center gap-6 items-start">
            @if ($tugas->attachment)
                <div class="avatar">
                    <div class="w-20 rounded-box bg-base-100">
                        <img src="{{ $tugas->image ?? '' }}" alt="">
                    </div>
                </div>
            @endif
            <div class="flex flex-1 flex-col space-y-2">
                <h3 class="card-title">{{ $tugas->title }}</h3>
                <p class="line-clamp-2 text-sm opacity-50">{{ $tugas->body }}</p>
                @if ($tugas->duedate)
                    <div>
                        <button class="btn btn-sm" disabled>
                            <x-tabler-calendar class="size-5" />
                            <span>Due date : {{ $tugas->duedate->format('d F Y') }}</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="card-actions">
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-circle">
                        <x-tabler-dots-vertical class="size-5" />
                    </div>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                        @can('tugas.show')
                            <li>
                                <button>
                                    <x-tabler-folder class="size-5" />
                                    <span>Detail tugas</span>
                                </button>
                            </li>
                        @endcan
                        @can('tugas.edit')
                            <li>
                                <button wire:click="dispatch('editTugas', {tugas: {{ $tugas->id }}})">
                                    <x-tabler-pencil class="size-5" />
                                    <span>Edit tugas</span>
                                </button>
                            </li>
                        @endcan
                        @can('tugas.delete')
                            <li></li>
                            <li class="text-error">
                                <button wire:click="dispatch('deleteTugas', {tugas: {{ $tugas->id }}})">
                                    <x-tabler-trash class="size-5" />
                                    <span>Hapus tugas</span>
                                </button>
                            </li>
                        @endcan
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
