<div class="page-wrapper space-y-10">

    <div class="space-y-4">
        <div class="card card-compact h-72 image-full">
            <figure class="">
                <img src="{{ $group->image_url }}" alt="Shoes" class="bg-cover w-full" />
            </figure>
            <div class="card-body">
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
                    <div class="flex flex-col gap-2 p-4">
                        <h3 class="text-3xl font-semibold">{{ $group->name }}</h3>
                        <p class="opacity-50 text-sm">{{ $group->desc }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div role="tablist" class="tabs tabs-bordered">
        <input type="radio" name="tabkelas" role="tab" class="tab" aria-label="Material"
            @checked($tabkelas == 'materi') />
        <div role="tabpanel" class="tab-content py-10">
            @if ($group->materials->count() != 0)
                <div class="space-y-4">
                    <div class="flex justify-between items-end">
                        <h2 class="text-xl font-bold">Materi belajar</h2>
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
        </div>

        <input type="radio" name="tabkelas" role="tab" class="tab" aria-label="Tugas"
            @checked($tabkelas == 'tugas') />
        <div role="tabpanel" class="tab-content py-10">Tab content 2</div>

        <input type="radio" name="tabkelas" role="tab" class="tab" aria-label="Ujian"
            @checked($tabkelas == 'ujian') />
        <div role="tabpanel" class="tab-content py-10">
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
        </div>

        <input type="radio" name="tabkelas" role="tab" class="tab" aria-label="Anggota"
            @checked($tabkelas == 'anggota') />
        <div role="tabpanel" class="tab-content py-10">
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
        </div>
    </div>


    @livewire('group.add-user')
    @livewire('group.show-code')
</div>
