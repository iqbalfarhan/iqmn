<div class="page-wrapper">
    <div class="flex justify-between items-center gap-6">
        <div>
            <input type="text" class="input input-bordered" placeholder="Cari permission" wire:model.live="cari">
        </div>

        <div class="flex gap-2">
            <button class="btn btn-primary" wire:click="$dispatch('createPermission')">
                <x-tabler-circle-plus class="w-5 h-5" />
                <span class="hidden lg:block">permission</span>
            </button>
            <button class="btn btn-primary" wire:click="$dispatch('createRole')">
                <x-tabler-circle-plus class="w-5 h-5" />
                <span class="hidden lg:block">role</span>
            </button>
        </div>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Permissions</th>
                @foreach ($roles as $role)
                    <th class="text-center">{{ $role->name }}</th>
                @endforeach
                <th class="text-center">Action</th>
            </thead>
            <tbody>
                @foreach ($permissions as $permit)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $permit->name }}</td>
                        @foreach ($roles as $role)
                            <td class="text-center">
                                <input type="checkbox" class="toggle toggle-sm toggle-primary"
                                    {{ $permit->hasRole($role->name) ? 'checked' : '' }}
                                    wire:change.prevent="assignRole({{ $permit->id }}, '{{ $role->name }}')" />
                            </td>
                        @endforeach
                        <td>
                            <div class="flex gap-1 justify-center">
                                <button class="btn btn-xs btn-success btn-square"
                                    wire:click="$dispatch('editPermission', {permission: {{ $permit->id }}})">
                                    <x-tabler-edit class="size-4" />
                                </button>
                                <button class="btn btn-xs btn-error btn-square"
                                    wire:confirm="Anda yakin akan menhapus permission ini"
                                    wire:click="deletePermission({{ $permit->id }})">
                                    <x-tabler-trash class="size-4" />
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <th>No</th>
                <th>Permissions</th>
                @foreach ($roles as $role)
                    <th>
                        <div class="flex gap-1 justify-center">
                            <button class="btn btn-xs btn-success btn-square"
                                wire:click="$dispatch('editRole', {role: {{ $role->id }}})">
                                <x-tabler-edit class="size-4" />
                            </button>
                            <button class="btn btn-xs btn-error btn-square"
                                wire:confirm="Anda yakin akan menhapus role ini"
                                wire:click="deleteRole({{ $role->id }})">
                                <x-tabler-trash class="size-4" />
                            </button>
                        </div>
                    </th>
                @endforeach
                <th class="text-center">Action</th>
            </tfoot>
        </table>
    </div>

    @livewire('permission.create')
</div>
