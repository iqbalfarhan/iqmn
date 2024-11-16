<div class="page-wrapper">
    <div class="flex flex-col md:flex-row justify-between gap-2">
        <input type="text" class="input input-bordered" placeholder="Pencarian">
        @can('ujian.create')
            <button wire:click="$dispatch('createUjian')" class="btn btn-primary">
                <x-tabler-circle-plus class="size-5" />
                <span>Buat sesi ujian</span>
            </button>
        @endcan
    </div>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Kelas</th>
                <th class="w-full">Title</th>
                <th>Start</th>
                <th class="text-center">Action</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->group->name }}</td>
                        <td>{{ Str::limit($data->title, 40) }}</td>
                        <td>
                            <input type="checkbox" class="toggle toggle-sm toggle-primary" @checked($data->start)
                                wire:change="dispatch('toggleStart', [{{ $data->id }}])" />
                        </td>
                        <td>
                            <div class="flex gap-1 self-center justify-center">
                                @can('ujian.show')
                                    <a href="{{ route('ujian.show', $data->id) }}"
                                        class="btn btn-xs btn-square btn-primary">
                                        <x-tabler-folder class="size-4" />
                                    </a>
                                @endcan
                                @can('ujian.edit')
                                    <button class="btn btn-xs btn-square btn-info"
                                        wire:click="dispatch('editUjian', [{{ $data->id }}])">
                                        <x-tabler-edit class="size-4" />
                                    </button>
                                @endcan
                                @can('ujian.edit')
                                    <a href="{{ route('ujian.edit', $data->id) }}" class="btn btn-xs btn-square btn-success"
                                        wire:navigate>
                                        <x-tabler-book class="size-4" />
                                    </a>
                                @endcan
                                @can('ujian.delete')
                                    <button class="btn btn-xs btn-square btn-error"
                                        wire:click="delete({{ $data->id }})">
                                        <x-tabler-trash class="size-4" />
                                    </button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('ujian.actions')
</div>
