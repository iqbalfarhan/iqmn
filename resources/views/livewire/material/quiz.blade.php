<div class="page-wrapper">
    <input type="checkbox" id="nilai" class="modal-toggle" wire:model.live="show" />
    <div class="modal">
        @php
            $nilai = round($nilai);

            if ($nilai == 100) {
                $pesan = 'Nilai sempurna';
                $emoji = '🥳';
            } elseif ($nilai >= 75 && $nilai <= 99) {
                $pesan = 'Kamu hebat';
                $emoji = '👍';
            } elseif ($nilai >= 50 && $nilai <= 74) {
                $pesan = 'Nilai cukup baik';
                $emoji = '👌';
            } elseif ($nilai >= 25 && $nilai <= 49) {
                $pesan = 'Perlu lebih usaha';
                $emoji = '💪';
            } elseif ($nilai >= 0 && $nilai <= 24) {
                $pesan = 'Memerlukan perbaikan signifikan';
                $emoji = '❌';
            } else {
                $pesan = 'Nilai tidak valid';
                $emoji = '❗';
            }
        @endphp
        <div class="modal-box text-center">
            <div class="flex flex-col space-y-10">
                <h3 class="font-semibold text-3xl">{{ $pesan }}</h3>
                <span class="text-gray-500 text-[100pt] py-6">{{ $emoji }}</span>
                <div class="flex flex-col">
                    <span>Nilai kamu :</span>
                    <span class="text-2xl font-black">{{ round($nilai) }} / 100</span>
                </div>
            </div>
            <div class="modal-action">
                <label for="nilai" class="btn">Close!</label>
            </div>
        </div>
    </div>
    <div class="card bg-base-200/50">
        <div class="card-body">
            <div class="space-y-8">
                <div class="flex justify-between items-center">
                    <div class="btn btn-ghost normal-case">
                        {{ count($jawaban) }}/{{ count($answers) }} soal telah diisi.
                    </div>

                    <button class="btn btn-ghost">Tentang quiz</button>
                </div>
                <div>
                    <p>Quiz ini merupakan tantangan akhir dari material {{ $material->title }} terdapat
                        {{ count($answers) }} soal yang harus diselesaikan. 1 soal memiliki bobot nilai sekitar
                        {{ round($bobot, 2) }} jika benar semua akan mendapatkan point 100. Harap tenang dan
                        konsentrasi selama mengerjakan quiz ini karena mungkin saja terdapat soal jebakan. selamat
                        mengerjakan</p>

                </div>
                <div class="divider">Mulai</div>
                @foreach ($datas as $data)
                    <div class="card card-compact" wire:key="{{ $data->id }}">
                        <div class="card-body">
                            <div class="flex flex-col md:flex-row gap-6">
                                <div>
                                    <div class="tooltip" data-tip="reset jawaban">
                                        <button wire:click="unsetJawaban({{ $data->id }})"
                                            class="text-lg btn btn-circle btn-primary disabled {{ isset($jawaban[$data->id]) ? '' : 'btn-outline' }}">
                                            {{ $no++ }}.</button>
                                    </div>
                                </div>
                                <div class="flex flex-1 flex-col gap-4">
                                    @if ($data->media)
                                        <img src="{{ $data->media_url }}" alt=""
                                            class="rounded-lg w-full max-w-80">
                                    @endif
                                    <div class="text-xl font-semibold">{{ $data->question }}</div>
                                    <div class="flex flex-col gap-2">
                                        <div class="form-control">
                                            <label class="flex items-center gap-2 cursor-pointer">
                                                <input type="radio" class="radio radio-primary"
                                                    name="{{ $data->id }}" value="a"
                                                    wire:model.live="jawaban.{{ $data->id }}" />
                                                <span class="label-text">{{ $data->a }}</span>
                                            </label>
                                        </div>
                                        <div class="form-control">
                                            <label class="flex items-center gap-2 cursor-pointer">
                                                <input type="radio" class="radio radio-primary"
                                                    name="{{ $data->id }}" value="b"
                                                    wire:model.live="jawaban.{{ $data->id }}" />
                                                <span class="label-text">{{ $data->b }}</span>
                                            </label>
                                        </div>
                                        <div class="form-control">
                                            <label class="flex items-center gap-2 cursor-pointer">
                                                <input type="radio" class="radio radio-primary"
                                                    name="{{ $data->id }}" value="c"
                                                    wire:model.live="jawaban.{{ $data->id }}" />
                                                <span class="label-text">{{ $data->c }}</span>
                                            </label>
                                        </div>
                                        <div class="form-control">
                                            <label class="flex items-center gap-2 cursor-pointer">
                                                <input type="radio" class="radio radio-primary"
                                                    name="{{ $data->id }}" value="d"
                                                    wire:model.live="jawaban.{{ $data->id }}" />
                                                <span class="label-text">{{ $data->d }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider md:hidden"></div>
                @endforeach
            </div>

            <div class="divider">Selesai</div>

            <div class="card-actions">
                <button wire:click="periksa" class="btn btn-primary">Selesai dan periksa jawaban</button>
            </div>
        </div>
    </div>

</div>
