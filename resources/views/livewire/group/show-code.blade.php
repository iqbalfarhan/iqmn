<div>
    <input type="checkbox" class="modal-toggle" @checked($group ? true : false) />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-sm">
            <h3 class="text-lg font-bold">Kode group</h3>
            <div class="py-4 space-y-4">
                <input type="text" class="input input-bordered input-lg w-full text-center" value="{{ $group?->code }}">
                <div>
                    <a class="badge">{{ route('group.join', $group->code ?? '') }}</a>
                </div>
            </div>
            <div class="modal-action">
                <button wire:click="closeModal" class="btn btn-ghost">Close</button>
            </div>
        </div>
    </div>
</div>
