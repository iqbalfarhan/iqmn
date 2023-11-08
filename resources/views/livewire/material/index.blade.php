<div class="space-y-6">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($datas as $data)
            @livewire('material.item', ['material' => $data], key($data->id))
        @endforeach
    </div>
</div>