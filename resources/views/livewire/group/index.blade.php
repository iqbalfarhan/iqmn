<div class="page-wrapper">

    <div class="flex flex-col md:flex-row justify-between gap-2">
        <input type="text" class="input input-bordered" placeholder="Cari group">
        <label for="groupFormModal" class="btn btn-primary">
            <x-tabler-circle-plus class="w-4 h-4" />
            <span>Buat Group</span>
        </label>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama group</th>
                <th>Anggota</th>
                <th class="text-center">Actions</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->users()->count() }}</td>
                        <td>
                            <div class="flex gap-1 justify-center">
                                <a href="{{ route('group.show', $data) }}" class="btn btn-info btn-xs btn-square"
                                    wire:navigate>
                                    <x-tabler-folder class="size-4" />
                                </a>
                                <button class="btn btn-success btn-xs btn-square"
                                    wire:click="$dispatch('editGroup', {group:{{ $data->id }}})">
                                    <x-tabler-edit class="size-4" />
                                </button>
                                <button class="btn btn-error btn-xs btn-square"
                                    wire:click="$dispatch('deleteGroup', {group:{{ $data->id }}})">
                                    <x-tabler-trash class="size-4" />
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('group.form')
</div>
