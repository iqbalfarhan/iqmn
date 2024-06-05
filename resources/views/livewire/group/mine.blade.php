<div class="page-wrapper">
    <div class="flex flex-col md:flex-row gap-2 justify-between">
        <input type="text" class="input input-bordered" placeholder="Pencarian">
    </div>

    <div>
        <div class="grid gap-2">
            @foreach ($datas as $data)
                @livewire('group.item', ['group' => $data, 'showToggleJoin' => false], key($data->id))
            @endforeach
        </div>
    </div>

    @livewire('group.cari')
</div>
