<div class="space-y-6">
    <div class="text-4xl font-black text-center w-full text-primary">{{ config('app.name') }}</div>

    <div class="card w-96 bg-base-100">
        <form class="card-body" wire:submit.prevent="register">
            <h2 class="card-title">Registrasi akun</h2>

            <div class="py-4 space-y-4">
                <div class="space-y-2">
                    <input type="text" class="input w-full input-bordered @error('name') input-error @enderror"
                        placeholder="Nama lengkap" wire:model="name">
                    <input type="email" class="input w-full input-bordered @error('email') input-error @enderror"
                        placeholder="Email address" wire:model="email">
                    <input type="pasword" class="input w-full input-bordered @error('password') input-error @enderror"
                        placeholder="Password" wire:model="password">
                    <input type="text" class="input w-full input-bordered @error('code') input-error @enderror"
                        placeholder="Kode Registrasi" wire:model="code">
                </div>
            </div>

            <div class="card-actions">
                <button class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>

    <div class="text-center text-sm">
        <a href="{{ route('login') }}" wire:navigate>Sudah punya akun? login disini</a>
    </div>
</div>
