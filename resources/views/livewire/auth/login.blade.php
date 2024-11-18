<div class="space-y-10">

    @livewire('partial.logo')

    <div class="card w-96 bg-base-100 shadow">
        <form class="card-body" wire:submit="login">
            <h2 class="card-title">Selamat datang</h2>

            <div class="py-4 space-y-4">
                <div class="space-y-2">
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
                </div>
            </div>

            <div class="card-actions">
                <button class="btn btn-primary" type="submit">
                    <x-tabler-login class="w-5 h-5" />
                    <span>Sign in</span>
                </button>
            </div>

            <div class="flex flex-col gap-2">
                <div class="divider text-xs opacity-50">Login dengan cara lain :</div>
                <a href="{{ route('auth.redirect') }}" class="btn btn-primary normal-case" type="button">
                    <x-tabler-brand-github class="w-5 h-5" />
                    <span>Sign in with Github</span>
                </a>
            </div>

        </form>
    </div>

    <div class="text-center text-sm">
        @if (Route::has('register'))
            <a href="{{ route('register') }}" wire:navigate>Belum punya akun? daftar sekarang</a>
        @endif
    </div>
</div>
