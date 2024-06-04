<div class="page-wrapper">
    <div class="flex flex-col md:flex-row gap-2 justify-between">
        <input type="search" class="input input-bordered" placeholder="Pencarian" wire:model.live="cari">
        <a href="{{ route('material.create') }}" class="btn btn-primary">
            <x-tabler-circle-plus class="w-5 h-5" />
            <span>Tambah Material</span>
        </a>
    </div>
    <div class="table-wrapper">
        <table class="table">
            <thead class="border-b-4 border-primary">
                <th>No</th>
                <th>Title</th>
                <th>Pinned</th>
                <th>Chat</th>
                <th>Quiz</th>
                <th>Show</th>
                <th class="text-center">Action</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr @class(['line-through opacity-30' => !$data->show]) wire:key="{{ $data->id }}">
                        <td>{{ $data->id }}</td>
                        <td class="whitespace-nowrap">
                            <div class="flex gap-3 items-center text-left">
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
                            <div class="badge">{{ $data->users->count() }}</div>
                        </td>
                        <td>
                            <div class="badge">{{ $data->discussions->count() }}</div>
                        </td>
                        <td>
                            <div class="badge">{{ $data->quizzes->count() }}</div>
                        </td>
                        <td>
                            <input type="checkbox" class="toggle toggle-sm toggle-primary" @checked($data->show)
                                wire:change="toggleShowMaterial({{ $data->id }})" />
                        </td>
                        <td>
                            <div class="flex gap-1 self-center justify-center">
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
