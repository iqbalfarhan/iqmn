<div class="space-y-6">
    <div>
        <input type="text" class="input input-bordered" placeholder="Cari group">
    </div>

    <div>
        <div class="grid lg:grid-cols-3 gap-6">
            @foreach ($datas as $data)
                @livewire('group.item', ['group' => $data], key($data->id))
            @endforeach
        </div>
    </div>
</div>
