<nav class="border-b border-[var(--secondary)] pb-1">
    <div class="flex justify-between items-center">
        <a href="{{ route('user.home') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"
                class="w-10" /></a>
        <ul class="list-none flex gap-8">
            <li>
                <a href="{{ route('user.home') }}" class="uppercase px-4 {{ request()->path() == '/' ? 'rounded-full bg-[var(--secondary)] text-[var(--primary)]' : 'text-[var(--secondary)]' }}">Home</a>
            </li>
            @auth
                <li>
                    <a href="{{ route('admin.home') }}" class="uppercase text-[var(--secondary)]">Admin Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('auth.logout') }}" class="uppercase text-[var(--secondary)]">Logout</a>
                </li>
            @endauth
            @guest
                <li>
                    <a href="{{ route('auth.login') }}" class="uppercase px-4 {{ request()->path() == 'login' ? 'rounded-full bg-[var(--secondary)] text-[var(--primary)]' : 'text-[var(--secondary)]' }}">login</a>
                </li>
            @endguest
        </ul>
    </div>
</nav>
