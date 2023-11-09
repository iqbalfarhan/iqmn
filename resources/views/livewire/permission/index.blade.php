<div class="space-y-6">
    <div class="flex justify-between items-center gap-6">
        <div>
            <input type="text" class="input input-bordered" placeholder="Cari permission" wire:model.live="cari">
        </div>

        <div>
            <label for="createModal" class="btn btn-primary btn-sm">
                <x-tabler-circle-plus class="w-5 h-5" />
                <span class="hidden lg:block">permission</span>
            </label>
            <label for="createModal" class="btn btn-primary btn-sm">
                <x-tabler-circle-plus class="w-5 h-5" />
                <span class="hidden lg:block">role</span>
            </label>
        </div>
    </div>

    <div class="overflow-x-auto bg-base-100 shadow-xl rounded-xl">
        <table class="table">
            <thead class="border-b-4 border-primary">
                <th>Guard</th>
                <th>Permissions</th>
                @foreach ($roles as $role)
                    <th>{{ $role->name }}</th>
                @endforeach
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($permissions as $permit)
                    <tr>
                        <td>{{ $permit->guard_name }}</td>
                        <td>{{ $permit->name }}</td>
                        @foreach ($roles as $role)
                            <td>
                                <input type="checkbox" class="toggle toggle-sm"
                                    {{ $permit->hasRole($role->name) ? 'checked' : '' }}
                                    wire:change.prevent="assignRole({{ $permit->id }}, '{{ $role->name }}')" />
                            </td>
                        @endforeach
                        <td>
                            <button class="btn btn-xs btn-error btn-square"
                                wire:confirm="Anda yakin akan menhapus permission ini"
                                wire:click="deletePermission({{ $permit->id }})">
                                <x-tabler-trash class="w-4 h-4" />
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('permission.create')
</div>
