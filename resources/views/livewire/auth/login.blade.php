<div class="space-y-4">
    <div class="card w-96 bg-base-100 shadow">
        <form class="card-body" wire:submit="login">
            <h2 class="card-title">Selamat datang, silakan login</h2>
    
            <div class="py-4 space-y-4">
                <div class="space-y-1">
                    <input type="text" class="input w-full input-bordered @error('email') input-error @enderror" placeholder="email" wire:model="email">
                    <input type="pasword" class="input w-full input-bordered @error('password') input-error @enderror" placeholder="password" wire:model="password">
                </div>
            </div>
    
            <div class="card-actions">
                <button class="btn btn-primary">login</button>
            </div>
        </form>
    </div>

    <div class="text-center text-sm">
        <a href="{{ route('register') }}" wire:navigate>Belum punya akun? daftar sekarang</a>
    </div>
</div>