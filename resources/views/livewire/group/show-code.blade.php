<div>
    <input type="checkbox" class="modal-toggle" @checked($group ? true : false) />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-bold">Kode group</h3>
                <button wire:click="closeModal" class="btn btn-circle btn-ghost">
                    <x-tabler-x />
                </button>
            </div>
            <div class="space-y-6">
                <div class="text-7xl font-bold bg-base-300 text-center my-4 py-10 rounded-box">{{ $group?->code }}</div>
                <p>Masuk menu kelas saya, klik pada tombol join kelas dan masukkan kode di atas untuk bergabung kengan
                    kelas {{ $group?->name }}.</p>
            </div>
        </div>
    </div>
</div>
