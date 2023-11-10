<div class="space-y-6">
    <div class="flex justify-between">
        <input type="search" class="input input-bordered" placeholder="Pencarian">
        <a href="{{ route('material.create') }}" class="btn btn-primary btn-sm">
            <x-tabler-circle-plus class="w-5 h-5" />
            <span>Tambah</span>
        </a>
    </div>
    <div class="overflow-x-auto bg-base-100 shadow-xl rounded-xl">
        <table class="table">
            <thead class="border-b-4 border-primary">
                <th>No</th>
                <th>Title</th>
                <th>Comot</th>
                <th>Chat</th>
                <th>tags</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ Str::limit($data->title, 40) }}</td>
                        <td>{{ $data->users->count() }}</td>
                        <td>{{ $data->discussions->count() }}</td>
                        <td>{{ count($data->tags ?? []) }}</td>
                        <td>
                            <div class="flex gap-1">
                                <a href="{{ route('material.show', $data->id) }}"
                                    class="btn btn-xs btn-square btn-primary">
                                    <x-tabler-folder class="w-4 h-4" />
                                </a>
                                <a href="{{ route('material.edit', $data->id) }}"
                                    class="btn btn-xs btn-square btn-success">
                                    <x-tabler-edit class="w-4 h-4" />
                                </a>
                                <button class="btn btn-xs btn-square btn-error"
                                    wire:click="delete({{ $data->id }})">
                                    <x-tabler-trash class="w-4 h-4" />
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
