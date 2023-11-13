<ul class="menu space-y-6 p-4 w-80 min-h-full bg-base-100">
    <li>
        <a class="btn btn-ghost normal-case font-black text-primary text-2xl" href="{{ route('home') }}"
            wire:navigate>{{ config('app.name') }}</a>
    </li>
    <li>
        <h2 class="menu-title">Dashboard</h2>
        <ul>
            <li>
                <a href="{{ route('home') }}" class="{{ Request::route()->getName() == 'home' ? 'active' : '' }}"
                    wire:navigate>
                    <x-tabler-home class="w-5 h-5" />
                    <span>Beranda</span>
                </a>
            </li>
            @can('material.comot')
                <li>
                    <a href="{{ route('material.comot') }}"
                        class="{{ Request::route()->getName() == 'material.comot' ? 'active' : '' }}" wire:navigate>
                        <x-tabler-books class="w-5 h-5" />
                        <span>Materi belajarku</span>
                    </a>
                </li>
            @endcan
            @can('material.cari')
                <li>
                    <a href="{{ route('material.cari') }}"
                        class="{{ Request::route()->getName() == 'material.cari' ? 'active' : '' }}" wire:navigate>
                        <x-tabler-search class="w-5 h-5" />
                        <span>Cari materi</span>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
    @can('managerial.menu')
        <li>
            <h2 class="menu-title">Managerials</h2>
            <ul>
                @can('material.index')
                    <li>
                        <a href="{{ route('material.index') }}"
                            class="{{ Request::route()->getName() == 'material.index' ? 'active' : '' }}" wire:navigate>
                            <x-tabler-book class="w-5 h-5" />
                            <span>Materials data</span>
                        </a>
                    </li>
                @endcan
                @can('user.index')
                    <li>
                        <a href="{{ route('user.index') }}"
                            class="{{ Request::route()->getName() == 'user.index' ? 'active' : '' }}" wire:navigate>
                            <x-tabler-users class="w-5 h-5" />
                            <span>User mangement</span>
                        </a>
                    </li>
                @endcan
                @can('permission.index')
                    <li>
                        <a href="{{ route('permission.index') }}"
                            class="{{ Request::route()->getName() == 'permission.index' ? 'active' : '' }}" wire:navigate>
                            <x-tabler-user-shield class="w-5 h-5" />
                            <span>Role & permissions</span>
                        </a>
                    </li>
                @endcan
                @can('group.index')
                    <li>
                        <a href="{{ route('group.index') }}"
                            class="{{ Request::route()->getName() == 'group.index' ? 'active' : '' }}" wire:navigate>
                            <x-tabler-users-group class="w-5 h-5" />
                            <span>Group setting</span>
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
            </ul>
        </li>
    @endcan
    <li>
        <h2 class="menu-title">Authentication</h2>
        <ul>
            <li>
                <a href="{{ route('about') }}" class="{{ Request::route()->getName() == 'about' ? 'active' : '' }}"
                    wire:navigate>
                    <x-tabler-info-square class="w-5 h-5" />
                    <span>Tentang app</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile') }}"
                    class="{{ Request::route()->getName() == 'profile' ? 'active' : '' }}" wire:navigate>
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
