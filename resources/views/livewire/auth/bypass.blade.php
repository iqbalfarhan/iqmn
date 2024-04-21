<div class="page-wrapper">
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th class="text-center">Actions</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            <div class="flex gap-1 justify-center">
                                <button class="btn btn-xs btn-square btn-primary" wire:click="login({{ $data->id }})">
                                    <x-tabler-login class="size-4" />
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
