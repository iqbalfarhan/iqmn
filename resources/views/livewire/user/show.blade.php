<div class="page-wrapper space-y-10">

    <div class="grid md:grid-cols-2 gap-6">
        @livewire('user.card', ['user' => $user])
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="col-span-full">
            <h3 class="text-xl font-bold">Social media:</h3>
        </div>
        @foreach ($user->sosmeds as $sosmed)
            <a href="{{ $sosmed->link }}" target="_blank" class="card card-compact bg-base-200">
                <div class="card-body">
                    <div class="flex flex-1 flex-col">
                        <div class="font-semibold text-lg capitalize">{{ $sosmed->name }}</div>
                        <div class="text-sm">{{ $sosmed->link }}</div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="col-span-full">
            <h3 class="text-xl font-bold">Materi belajar yang dipin:</h3>
        </div>
        @foreach ($user->materials as $material)
            @livewire('material.item', ['material' => $material], key($material->id))
        @endforeach
    </div>

    @livewire('user.actions')
</div>
