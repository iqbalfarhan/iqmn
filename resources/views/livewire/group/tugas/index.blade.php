<div class="grid grid-cols-1 gap-4">
    @forelse ($datas as $data)
        @livewire('group.tugas.item', ['tugas' => $data], key($data->id))
    @empty
        <div class="col-span-full">
            @livewire('partial.nocontent')
        </div>
    @endforelse

    @livewire('group.tugas.actions')
</div>
