<div class="space-y-6">

    <div class="text-4xl font-black text-center w-full text-primary">{{ config('app.name') }}</div>

    <div class="card w-96 bg-base-100">
        <form class="card-body" wire:submit="login">
            <h2 class="card-title">Selamat datang</h2>

            <div class="py-4 space-y-4">
                <div class="space-y-2">
                    <input type="email" class="input w-full input-bordered @error('email') input-error @enderror"
                        placeholder="Email address" wire:model="email" autocomplete="email">
                    <input type="password" class="input w-full input-bordered @error('password') input-error @enderror"
                        placeholder="Password" wire:model="password">
                </div>
            </div>

            <div class="card-actions">
                <button class="btn btn-primary" type="submit">
                    <x-tabler-login class="w-5 h-5" />
                    <span>Sign in</span>
                </button>
            </div>

            <div class="flex flex-col gap-1">
                <div class="divider text-xs opacity-50">Cara lain</div>
                <button class="btn btn-block normal-case" type="button">
                    <x-tabler-brand-github class="w-5 h-5" />
                    <span>Login dengan github</span>
                </button>
            </div>

        </form>
    </div>

    <div class="text-center text-sm">
        @if (Route::has('register'))
            <a href="{{ route('register') }}" wire:navigate>Belum punya akun? daftar sekarang</a>
        @endif
    </div>
</div>
