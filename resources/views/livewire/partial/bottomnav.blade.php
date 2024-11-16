<div class="btm-nav border-t-2 border-base-300 md:hidden">
    <a href="{{ route('home') }}" @class(['active text-primary' => Route::is('home')]) wire:navigate>
        <x-tabler-home class="size-6" />
        <span class="text-xs">Home</span>
    </a>
    <a href="{{ route('material.cari') }}" @class([
        'active text-primary' => Route::is('material.cari'),
    ]) wire:navigate>
        <x-tabler-search class="size-6" />
        <span class="text-xs">Cari</span>
    </a>
    <a href="{{ route('material.comot') }}" @class([
        'active text-primary' => Route::is([
            'material.comot',
            'material.show',
            'material.quiz',
        ]),
    ]) wire:navigate>
        <x-tabler-book class="size-6" />
        <span class="text-xs">Materi</span>
    </a>
    <a href="{{ route('group.mine') }}" @class([
        'active text-primary' => Route::is(['group.mine', 'group.show']),
    ]) wire:navigate>
        <x-tabler-users class="size-6" />
        <span class="text-xs">Kelas</span>
    </a>
    <a href="{{ route('profile') }}" @class(['active text-primary' => Route::is('profile')]) wire:navigate>
        <x-tabler-user class="size-6" />
        <span class="text-xs">Profile</span>
    </a>
</div>
