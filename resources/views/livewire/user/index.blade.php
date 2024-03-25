<div class="space-y-6">
    <div class="flex justify-between">
        <input type="search" class="input input-bordered" placeholder="Pencarian">
    </div>
    <div class="overflow-x-auto bg-base-100 shadow-xl rounded-xl">
        <table class="table">
            <thead class="border-b-4 border-primary">
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>
                            <div class="flex gap-2 items-center">
                                <div class="avatar">
                                    <div class="w-6 rounded-full">
                                        <img src="{{ $data->image_url }}" alt="">
                                    </div>
                                </div>
                                <div>{{ $data->name }}</div>
                            </div>
                        </td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->getRoleNames()->first() }}</td>
                        <td>
                            <div class="flex gap-1">
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
