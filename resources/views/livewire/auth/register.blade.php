<div class="space-y-6">
    @livewire('partial.logo')

    <div class="card w-96 bg-base-100">
        <form class="card-body" wire:submit.prevent="register">
            <h2 class="card-title">Registrasi akun</h2>

            <div class="py-4 space-y-4">
                <div class="space-y-2">
                    <label @class([
                        'input input-bordered flex items-center gap-2',
                        'input-error' => $errors->first('name'),
                    ])>
                        <div class="size-5">
                            <x-tabler-user class="size-5" />
                        </div>
                        <input type="text" class="grow" placeholder="Nama lengkap" wire:model="name" />
                    </label>
                    <label @class([
                        'input input-bordered flex items-center gap-2',
                        'input-error' => $errors->first('email'),
                    ])>
                        <div class="size-5">
                            <x-tabler-at class="size-5" />
                        </div>
                        <input type="text" class="grow" placeholder="Email address" wire:model="email"
                            autocomplete="email" />
                    </label>
                    <label @class([
                        'input input-bordered flex items-center gap-2',
                        'input-error' => $errors->first('password'),
                    ])>
                        <div class="size-5">
                            <x-tabler-key class="size-5" />
                        </div>
                        <input type="{{ $showPassword ? 'text' : 'password' }}" class="grow" placeholder="Password"
                            wire:model="password" />
                        <button type="button" class="size-5 cursor-pointer" wire:click="toggleShowPassword">
                            @if ($showPassword)
                                <x-tabler-eye-off class="size-5" />
                            @else
                                <x-tabler-eye class="size-5" />
                            @endif
                        </button>
                    </label>
                    <label @class([
                        'input input-bordered flex items-center gap-2',
                        'input-error' => $errors->first('code'),
                    ])>
                        <div class="size-5">
                            <x-tabler-asterisk class="size-5" />
                        </div>
                        <input type="text" class="grow" placeholder="Kode registrasi" wire:model="code" />
                    </label>
                </div>
            </div>

            <div class="card-actions">
                <button class="btn btn-primary">
                    <x-tabler-login class="w-5 h-5" />
                    <span>Register</span>
                </button>
            </div>
        </form>
    </div>

    <div class="text-center text-sm">
        <a href="{{ route('login') }}" wire:navigate>Sudah punya akun? login disini</a>
    </div>
</div>
