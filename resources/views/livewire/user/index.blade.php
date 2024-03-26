<div class="space-y-6">
    <div class="flex justify-between">
        <input type="search" class="input input-bordered" placeholder="Pencarian">
    </div>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Github link</th>
                <th>Role</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td class="whitespace-nowrap">
                            <div class="flex gap-3 items-center text-left">
                                <div class="avatar">
                                    <div class="w-8 rounded aspect-video">
                                        <img src="{{ $data->image_url }}" />
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-bold">{{ Str::limit($data->name, 40) }}</span>
                                    <span class="text-xs opacity-50">{{ $data->email }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="flex gap-1">
                                @foreach ($data->sosmeds as $sm)
                                    <a href="{{ $sm->link }}" class="btn btn-xs btn-square"
                                        wire:key="{{ $sm->id }}" target="_blank">
                                        <x-tabler-brand-github class="size-4" />
                                    </a>
                                @endforeach
                            </div>
                        </td>
                        <td>{{ $data->getRoleNames()->first() }}</td>
                        <td>
                            <div class="flex gap-1">
                                <a href="{{ route('user.show', $data) }}" class="btn btn-xs btn-square btn-info"
                                    wire:navigate>
                                    <x-tabler-folder class="w-4 h-4" />
                                </a>
                                <button class="btn btn-xs btn-square btn-success"
                                    wire:click="$dispatch('editUser', {user:{{ $data->id }}})">
                                    <x-tabler-edit class="w-4 h-4" />
                                </button>
                                <button class="btn btn-xs btn-square btn-error"
                                    wire:click="$dispatch('deleteUser', {user:{{ $data->id }}})"
                                    wire:confirm="Yakin akan menghapus user ini?">
                                    <x-tabler-trash class="w-4 h-4" />
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('user.actions')
</div>
