<div class="space-y-6">
    <div class="flex justify-between">
        <input type="text" class="input input-bordered" placeholder="Cari group">
        <div>
            <label for="groupFormModal" class="btn btn-primary btn-sm">
                <x-tabler-circle-plus class="w-4 h-4" />
                <span>group</span>
            </label>
        </div>
    </div>

    <div>
        <div class="grid lg:grid-cols-3 gap-6">
            @foreach ($datas as $data)
                @livewire('group.item', ['group' => $data], key($data->id))
            @endforeach
        </div>
    </div>

    @livewire('group.form')
</div>
