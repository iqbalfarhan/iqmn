<div>
    <input type="checkbox" id="addDiscussion" class="modal-toggle" wire:model="show" />
    <div class="modal">
        <form class="modal-box" wire:submit.prevent="addDiscussion">
            <h3 class="font-bold text-lg">Tulis diskusimu</h3>
            <div class="py-4">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Pesan diskusi</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="chat"></textarea>
                </div>
            </div>
            <div class="modal-action justify-between">
                <label for="addDiscussion" class="btn">Close!</label>
                <button class="btn btn-primary">kirim</button>
            </div>
        </form>
    </div>
</div>
