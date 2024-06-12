<ul class="menu space-y-6 p-4 w-80 min-h-full bg-base-100 border-r-2 border-base-300">
    <li>
        <a class="btn btn-ghost normal-case font-black text-primary text-2xl" href="{{ route('home') }}"
            wire:navigate>{{ config('app.name') }}</a>
    </li>
    <li>
        <h2 class="menu-title">Dashboard</h2>
        <ul>
            <li>
                <a href="{{ route('home') }}" @class(['active' => Route::is('home')]) wire:navigate>
                    <x-tabler-home class="w-5 h-5" />
                    <span>Beranda</span>
                </a>
            </li>
            @can('material.comot')
                <li>
                    <a href="{{ route('material.comot') }}" @class(['active' => Route::is('material.comot')]) wire:navigate>
                        <x-tabler-books class="w-5 h-5" />
                        <span>Materi belajarku</span>

                        @livewire('partial.count-materiku')
                    </a>
                </li>
            @endcan
            @can('material.cari')
                <li>
                    <a href="{{ route('material.cari') }}" @class(['active' => Route::is('material.cari')]) wire:navigate>
                        <x-tabler-search class="w-5 h-5" />
                        <span>Cari materi</span>
                    </a>
                </li>
            @endcan
            @can('group.mine')
                <li>
                    <a href="{{ route('group.mine') }}" @class(['active' => Route::is(['group.mine', 'group.show'])]) wire:navigate>
                        <x-tabler-user-circle class="w-5 h-5" />
                        <span>Kelas saya</span>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
    @can('managerial.menu')
        <li>
            <h2 class="menu-title">Data master</h2>
            <ul>
                @can('post.index')
                    <li>
                        <a href="{{ route('post.index') }}" @class([
                            'active' => Route::is(['post.index', 'post.show', 'post.edit']),
                        ]) wire:navigate>
                            <x-tabler-bookmark class="w-5 h-5" />
                            <span>Post Article</span>
                        </a>
                    </li>
                @endcan
                @can('material.index')
                    <li>
                        <a href="{{ route('material.index') }}" @class([
                            'active' => Route::is(['material.index', 'material.show', 'material.edit']),
                        ]) wire:navigate>
                            <x-tabler-book class="w-5 h-5" />
                            <span>Data Materials</span>
                        </a>
                    </li>
                @endcan
                @can('user.index')
                    <li>
                        <a href="{{ route('user.index') }}" @class(['active' => Route::is(['user.index', 'user.show'])]) wire:navigate>
                            <x-tabler-users class="w-5 h-5" />
                            <span>Management User</span>
                        </a>
                    </li>
                @endcan

                @can('group.index')
                    <li>
                        <a href="{{ route('group.index') }}" @class(['active' => Route::is(['group.index', 'group.show'])]) wire:navigate>
                            <x-tabler-users-group class="w-5 h-5" />
                            <span>Pengaturan Group</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>
    @endcan
    @can('managerial.menu')
        <li>
            <h2 class="menu-title">Administrator</h2>
            <ul>
                @can('permission.index')
                    <li>
                        <a href="{{ route('permission.index') }}" @class(['active' => Route::is('permission.index')]) wire:navigate>
                            <x-tabler-user-shield class="w-5 h-5" />
                            <span>Role & permissions</span>
                        </a>
                    </li>
                @endcan
                @can('adminer.index')
                    <li>
                        <a href="/adminer">
                            <x-tabler-database class="w-5 h-5" />
                            <span>Adminer database</span>
                        </a>
                    </li>
                @endcan
                @can('git.index')
                    <li>
                        <a href="{{ route('git.index') }}" @class(['active' => Route::is('git.index')]) wire:navigate>
                            <x-tabler-brand-git class="w-5 h-5" />
                            <span>Git control center</span>
                        </a>
                    </li>
                @endcan
                @can('auth.bypass')
                    <li>
                        <a href="{{ route('auth.bypass') }}" @class(['active' => Route::is('auth.bypass')]) wire:navigate>
                            <x-tabler-login class="w-5 h-5" />
                            <span>Bypass login</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>
    @endcan
    <li>
        <h2 class="menu-title">Authentication</h2>
        <ul>
            <li>
                <a href="{{ route('about') }}" @class(['active' => Route::is('about')]) wire:navigate>
                    <x-tabler-info-square class="w-5 h-5" />
                    <span>Tentang app</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile') }}" @class(['active' => Route::is('profile')]) wire:navigate>
                    <x-tabler-user class="w-5 h-5" />
                    <span>Edit profile</span>
                </a>
            </li>
            <li>
                <button wire:click='logout'>
                    <x-tabler-logout class="w-5 h-5" />
                    <span>Logout</span>
                </button>
            </li>
        </ul>
    </li>
</ul>
