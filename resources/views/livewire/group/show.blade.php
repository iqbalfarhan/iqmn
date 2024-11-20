<div class="page-wrapper space-y-6">

    <div class="space-y-4">
        <div class="card card-compact min-h-72 md:h-72 image-full z-0">
            <figure class="">
                <img src="{{ $group->image_url }}" alt="Shoes" class="bg-cover w-full" />
            </figure>
            <div class="card-body z-0">
                <div class="flex flex-1 flex-col justify-between">
                    <div class="flex justify-between">
                        <div></div>
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn m-1 btn-square btn-ghost">
                                <x-tabler-dots class="size-5" />
                                <span class="sr-only">Menu</span>
                            </div>
                            <ul tabindex="0"
                                class="dropdown-content menu text-base-content bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                @can('group.edit')
                                    <li>
                                        <button wire:click="dispatch('editGroup', {group: {{ $group->id }}})">
                                            <x-tabler-pencil class="size-5" />
                                            <span>Edit Kelas</span>
                                        </button>
                                    </li>
                                @endcan
                                <li>
                                    <button wire:click="dispatch('showCode', {group: {{ $group->id }}})">
                                        <x-tabler-grid-scan class="size-5" />
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
                                @can('group.error')
                                    <li>
                                        <button
                                            wire:click="dispatch('deleteGroupRedirect', {group: {{ $group->id }}, to:'{{ route('group.mine') }}'})"
                                            class="text-error">
                                            <x-tabler-trash class="size-5" />
                                            <span>Hapus Kelas</span>
                                        </button>
                                    </li>
                                @endcan
                                <li>
                                    <button class="text-error" wire:click="keluargroup">
                                        <x-tabler-logout class="size-5" />
                                        <span>Keluar group</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 p-4">
                        <h3 class="text-3xl font-semibold">{{ $group->name }}</h3>
                        <p class="opacity-50 text-sm">{{ $group->desc }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <ul class="menu menu-horizontal bg-base-200 rounded-box flex-nowrap overflow-x-auto w-full">
        <li><button wire:click="set('tabkelas', 'materi')" @class(['active' => $tabkelas == 'materi'])>Material</button></li>
        <li><button wire:click="set('tabkelas', 'tugas')" @class(['active' => $tabkelas == 'tugas'])>Tugas</button></li>
        <li><button wire:click="set('tabkelas', 'ujian')" @class(['active' => $tabkelas == 'ujian'])>Ujian</button></li>
        <li><button wire:click="set('tabkelas', 'anggota')" @class(['active' => $tabkelas == 'anggota'])>Anggota</button></li>
        <li><button wire:click="set('tabkelas', 'nilai')" @class(['active' => $tabkelas == 'nilai'])>Nilai</button></li>
        <div class="flex-1"></div>
        <li wire:loading>
            <span>
                <x-tabler-refresh class="size-5 animate-spin" />
            </span>
        </li>
    </ul>

    <div>
        @if ($tabkelas == 'materi')
            <div class="space-y-4">
                <div class="navbar">
                    <div class="navbar-start">
                        <h2 class="card-title">Materi belajar</h2>
                    </div>
                    <div class="navbar-end">
                        <a href="{{ route('material.create', ['group_id' => $group->id]) }}" class="btn btn-primary"
                            wire:navigate>
                            <x-tabler-plus class="size-5" />
                            <span>Tambah material</span>
                        </a>
                    </div>
                </div>
                <div class="grid md:grid-cols-3 gap-2 md:gap-6">
                    @forelse ($group->materials as $material)
                        <a href="{{ route('material.show', $material) }}">
                            @livewire('material.item', ['material' => $material], key($material->id))
                        </a>
                    @empty
                        <div class="col-span-full">
                            @livewire('partial.nocontent')
                        </div>
                    @endforelse
                </div>
            </div>
        @elseif ($tabkelas == 'tugas')
            <div class="space-y-4">
                <div class="navbar">
                    <div class="navbar-start">
                        <h2 class="card-title">Tugas kelas</h2>
                    </div>
                    <div class="navbar-end">
                        <button class="btn btn-primary"
                            wire:click="dispatch('createTugas', {group_id : {{ $group->id }}})">
                            <x-tabler-plus class="size-5" />
                            <span>Tambah tugas</span>
                        </button>
                    </div>
                </div>
                @livewire('group.tugas.index', ['group' => $group])
            </div>
        @elseif ($tabkelas == 'ujian')
            @can('ujian.user')
                <div class="space-y-4">
                    <div class="flex justify-between items-end">
                        <h2 class="text-xl font-bold">Ujian kelas</h2>
                    </div>
                    <div class="grid md:grid-cols-3 gap-2 md:gap-6">
                        @forelse ($group->ujians as $ujian)
                            <a href="{{ route('ujian.user', $ujian) }}">
                                @livewire('ujian.item', ['ujian' => $ujian], key($ujian->id))
                            </a>
                        @empty
                            <div class="col-span-full">
                                @livewire('partial.nocontent')
                            </div>
                        @endforelse
                    </div>
                </div>
            @endcan
        @elseif ($tabkelas == 'anggota')
            <div class="space-y-4">
                <div class="flex justify-between">
                    <h2 class="text-xl font-bold">Anggota kelas</h2>
                </div>
                <div class="grid grid-cols-6 md:grid-cols-12 gap-2">
                    @forelse ($group->users as $user)
                        <div @class(['avatar', 'online' => $user->id == $group->user_id])>
                            <div class="w-full rounded-full bg-base-300">
                                <img src="{{ $user->image_url }}" alt="">
                            </div>
                        </div>
                    @empty
                        @livewire('partial.nocontent')
                    @endforelse
                </div>
            </div>
        @elseif ($tabkelas == 'nilai')
            <div class="space-y-4">
                <div class="flex justify-between items-end">
                    <h2 class="text-xl font-bold">Nilai kelas</h2>
                </div>
                @livewire('partial.nocontent')
            </div>
        @endif
    </div>

    @livewire('group.add-user')
    @livewire('group.show-code')
    @livewire('group.form')
</div>
