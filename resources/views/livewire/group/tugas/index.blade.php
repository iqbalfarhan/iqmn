<div>
    @forelse ($datas as $data)
        @livewire('group.tugas.item', ['tugas' => $data], key($data->id))
    @empty
        @livewire('partial.nocontent')
    @endforelse

    @livewire('group.tugas.actions')
</div>
