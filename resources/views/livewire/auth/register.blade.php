<div class="space-y-4">
    <div class="card w-96 bg-base-100 shadow">
        <form class="card-body" wire:submit.prevent="register">
            <h2 class="card-title">Hallo, belum punya akun?</h2>
            <small>Isi form berikut ini untuk mendaftar</small>
    
            <div class="py-4 space-y-4">
                <div class="space-y-1">
                    <input type="text" class="input w-full input-bordered @error('name') input-error @enderror" placeholder="Full name" wire:model="name">
                    <input type="email" class="input w-full input-bordered @error('email') input-error @enderror" placeholder="email" wire:model="email">
                    <input type="pasword" class="input w-full input-bordered @error('password') input-error @enderror" placeholder="password" wire:model="password">
                    <input type="text" class="input w-full input-bordered @error('code') input-error @enderror" placeholder="Registration code" wire:model="code">
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