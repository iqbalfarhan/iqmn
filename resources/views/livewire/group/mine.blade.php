<div class="page-wrapper">
    <div class="flex flex-col md:flex-row gap-2 justify-between">
        <input type="text" class="input input-bordered" placeholder="Pencarian">
        <button class="btn btn-primary" wire:click="$dispatch('searchGroup')">
            <x-tabler-circle-plus class="size-5" />
            <span>Join group</span>
        </button>
    </div>

    <div>
        <div class="grid gap-2">
            @forelse ($datas as $data)
                @livewire('group.item', ['group' => $data, 'showToggleJoin' => false], key($data->id))
            @empty
                <div class="col-span-full">
                    @livewire('partial.nocontent')
                </div>
            @endforelse
        </div>
    </div>

    @livewire('group.cari')
</div>
