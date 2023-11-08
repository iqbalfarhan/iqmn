<ul class="menu space-y-4 p-4 w-80 min-h-full bg-base-200 text-base-content">
    <li>
        <h2 class="menu-title">Dashboard</h2>
        <ul>
            <li>
                <a href="{{ route('home') }}" class="{{ Request::route()->getName() == "home" ? "active" : "" }}" wire:navigate>
                    <x-tabler-home class="w-5 h-5" />
                    <span>Beranda</span>
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="{{ Request::route()->getName() == "about" ? "active" : "" }}" wire:navigate>
                    <x-tabler-user class="w-5 h-5" />
                    <span>Tentang app</span>
                </a>
            </li>
            <li>
                <a href="{{ route('material.index') }}" class="{{ Request::route()->getName() == "material.index" ? "active" : "" }}" wire:navigate>
                    <x-tabler-books class="w-5 h-5" />
                    <span>Materi belajar</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <h2 class="menu-title">Administration</h2>
        <ul>
            <li>
                <a href="" wire:navigate>
                    <x-tabler-tag class="w-5 h-5" />
                    <span>Tags material</span>
                </a>
            </li>
            <li>
                <a href="" wire:navigate>
                    <x-tabler-user class="w-5 h-5" />
                    <span>User mangement</span>
                </a>
            </li>
            <li>
                <a href="" wire:navigate>
                    <x-tabler-user class="w-5 h-5" />
                    <span>Role & permissions</span>
                </a>
            </li>
            <li>
                <a href="" wire:navigate>
                    <x-tabler-users class="w-5 h-5" />
                    <span>Group setting</span>
                </a>
            </li>
            <li>
                <a href="/adminer">
                    <x-tabler-database class="w-5 h-5" />
                    <span>Adminer database</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <h2 class="menu-title">Authentication</h2>
        <ul>
            <li>
                <a href="{{ route('profile') }}" class="{{ Request::route()->getName() == "profile" ? "active" : "" }}" wire:navigate>
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