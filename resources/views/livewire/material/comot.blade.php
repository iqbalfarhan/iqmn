<div class="page-wrapper">
    <div class="flex flex-col md:flex-row">
        <input type="search" class="input input-bordered" placeholder="Pencarian" wire:model.live="cari">
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($datas as $data)
            @livewire('material.item', ['material' => $data], key($data->id))
        @empty
            <div class="col-span-full">
                @livewire('partial.nocontent')
            </div>
        @endforelse
    </div>
</div>
