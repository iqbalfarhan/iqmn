<div class="space-y-6">
    <div class="flex justify-between">
        <input type="search" class="input input-bordered" placeholder="Pencarian">
        <a href="{{ route('material.create') }}" class="btn btn-primary btn-sm">
            <x-tabler-circle-plus class="w-5 h-5" />
            <span>Tambah</span>
        </a>
    </div>
    <div class="overflow-x-auto bg-base-100 shadow-xl rounded-xl">
        <table class="table text-center">
            <thead class="border-b-4 border-primary">
                <th>No</th>
                <th>Title</th>
                <th>Pinned</th>
                <th>Chat</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>
                            <div class="flex gap-3 items-center text-left whitespace-nowrap">
                                <div class="avatar">
                                    <div class="w-8 rounded aspect-video">
                                        <img src="{{ $data->image_url }}" />
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-bold">{{ Str::limit($data->title, 40) }}</span>
                                    <span class="text-xs opacity-50">{{ implode(', ', $data->tags ?? []) }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="badge">
                                <span>{{ $data->users->count() }}</span>
                            </div>
                        </td>
                        <td>{{ $data->discussions->count() }}</td>
                        <td>
                            <div class="flex gap-1 self-center">
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
