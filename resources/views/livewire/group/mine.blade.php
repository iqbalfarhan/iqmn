<div class="page-wrapper">
    <div class="flex flex-col md:flex-row gap-2 justify-between">
        <input type="text" class="input input-bordered" placeholder="Pencarian">
        <div class="flex flex-col md:flex-row gap-2">
            @can('group.join')
                <button class="btn btn-primary" wire:click="$dispatch('searchGroup')">
                    <x-tabler-plus class="size-5" />
                    <span>Join kelas</span>
                </button>
            @endcan
            @can('group.create')
                <button class="btn btn-primary btn-outline" wire:click="$dispatch('createGroup')">
                    <x-tabler-plus class="size-5" />
                    <span>Buat kelas</span>
                </button>
            @endcan
        </div>
    </div>

    @if ($datas)
        <div class="space-y-2">
            <div class="grid md:grid-cols-3 gap-2">
                @forelse ($datas as $data)
                    <a href="{{ route('group.show', $data) }}" wire:navigate>
                        @livewire('group.item', ['group' => $data, 'showToggleJoin' => false], key($data->id))
                    </a>
                @empty
                    <div class="col-span-full">
                        @livewire('partial.nocontent')
                    </div>
                @endforelse
            </div>
        </div>
    @endif

    @livewire('group.cari')
    @livewire('group.form')
</div>
