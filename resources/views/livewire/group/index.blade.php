<div class="page-wrapper">

    <div class="flex flex-col md:flex-row justify-between gap-2">
        <input type="text" class="input input-bordered" placeholder="Cari kelas">
        <button wire:click="$dispatch('createGroup')" class="btn btn-primary">
            <x-tabler-circle-plus class="w-4 h-4" />
            <span>Buat Kelas</span>
        </button>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Kode</th>
                <th class="w-full">Nama kelas</th>
                <th>Materi</th>
                <th>Anggota</th>
                <th class="text-center">Actions</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td class="font-mono">{{ $data->code }}</td>
                        <td class="whitespace-nowrap">
                            <div class="flex gap-3 items-center text-left">
                                <div class="avatar">
                                    <div class="w-8 rounded-box aspect-video">
                                        <img src="{{ $data->image_url }}" />
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-bold">{{ Str::limit($data->name, 40) }}</span>
                                    <span class="text-xs opacity-50">{{ Str::limit($data->desc, 40) }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $data->materials()->count() }}</td>
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
