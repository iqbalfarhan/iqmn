<div class="page-wrapper space-y-10">
    <div class="space-y-4">
        <h2 class="text-3xl font-bold capitalize">{{ $group->name }}</h2>
        <div class="card card-compact bg-base-200">
            <div class="card-body">
                <div class="flex flex-col md:flex-row gap-3">
                    <div>
                        <div class="avatar">
                            <div class="w-16 rounded-lg">
                                <img src="{{ $group->image_url }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 space-y-4">
                        <h3 class="card-title">{{ $group->name }}</h3>
                        <p>{{ $group->desc }} | {{ $group->code }}</p>
                        <p>link join kelas <a class="badge">{{ route('group.join', $group->code) }}</a></p>
                    </div>

                    <div>
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn m-1 btn-square">
                                <x-tabler-dots class="size-5" />
                                <span class="sr-only">Menu</span>
                            </div>
                            <ul tabindex="0"
                                class="dropdown-content menu bg-base-300 rounded-box z-[1] w-52 p-2 shadow">
                                <li>
                                    <button wire:click="dispatch('showCode', {group: {{ $group->id }}})">
                                        <x-tabler-upload class="size-5" />
                                        <span>Tampilkan kode</span>
                                    </button>
                                </li>
                                <li>
                                    <button wire:click="dispatch('addToGroup', {group: {{ $group->id }}})">
                                        <x-tabler-user-plus class="size-5" />
                                        <span>Add member</span>
                                    </button>
                                </li>
                                <li></li>
                                <li>
                                    <button class="text-error" wire:click="keluargroup">
                                        <x-tabler-logout class="size-5" />
                                        <span>Keluar group</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($group->materials->count() != 0)
        <div class="space-y-4">
            <div class="flex justify-between items-end">
                <h2 class="text-xl font-bold">Material kelas</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-2 md:gap-6">
                @foreach ($group->materials as $material)
                    <a href="{{ route('material.show', $material) }}">
                        @livewire('material.item', ['material' => $material], key($material->id))
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    @can('ujian.user')
        @if ($group->ujians->count() != 0)
            <div class="space-y-4">
                <div class="flex justify-between items-end">
                    <h2 class="text-xl font-bold">Ujian kelas</h2>
                </div>
                <div class="grid md:grid-cols-3 gap-2 md:gap-6">
                    @foreach ($group->ujians as $ujian)
                        <a href="{{ route('ujian.user', $ujian) }}">
                            @livewire('ujian.item', ['ujian' => $ujian], key($ujian->id))
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    @endcan

    <div class="space-y-4">
        <div class="flex justify-between">
            <h2 class="text-xl font-bold">Anggota kelas</h2>
        </div>
        <div class="grid grid-cols-6 md:grid-cols-12 gap-2">
            @foreach ($group->users as $user)
                <div @class(['avatar', 'online' => $user->id == $group->user_id])>
                    <div class="w-full rounded-full bg-base-300">
                        <img src="{{ $user->image_url }}" alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @livewire('group.add-user')
    @livewire('group.show-code')
</div>
