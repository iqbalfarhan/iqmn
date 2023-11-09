<div class="space-y-6">

    <div class="text-4xl font-black text-center text-primary">{{ config('app.name') }}</div>

    <div class="card w-96 bg-base-100 shadow">
        <form class="card-body" wire:submit="login">
            <h2 class="card-title">Selamat datang</h2>

            <div class="py-4 space-y-4">
                <div class="space-y-2">
                    <input type="text" class="input w-full input-bordered @error('email') input-error @enderror"
                        placeholder="Email address" wire:model="email">
                    <input type="password" class="input w-full input-bordered @error('password') input-error @enderror"
                        placeholder="Password" wire:model="password">
                </div>
            </div>

            <div class="card-actions">
                <button class="btn btn-primary" type="submit">login</button>
            </div>

            {{-- <div class="divider">OR</div>

            <div>
                <button class="btn btn-block btn-neutral" type="button">
                    <x-tabler-brand-github class="w-5 h-5" />
                    <span>login use github</span>
                </button>
            </div> --}}
        </form>
    </div>


    <div class="text-center text-sm">
        <a href="{{ route('register') }}" wire:navigate>Belum punya akun? daftar sekarang</a>
    </div>
</div>
