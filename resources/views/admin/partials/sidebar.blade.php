<aside class="sidebar">

    {{-- BRAND --}}
    <div class="brand">

        <div class="brand-badge">
            RD
        </div>

        <div>
            <div class="brand-name">
                RODA
            </div>

            <div class="brand-sub">
                Admin
            </div>
        </div>

    </div>


    {{-- MENU --}}
    <nav class="nav">

        {{-- DASHBOARD --}}
        <a href="{{ route('admin.dashboard') }}"
           class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

            Dashboard

        </a>


        {{-- MOTOR --}}
        <a href="{{ route('admin.motor.index') }}"
           class="nav-item {{ request()->routeIs('admin.motor.*') ? 'active' : '' }}">

            Motor

        </a>


        {{-- PENYEWAAN --}}
        {{-- <a href="{{ route('admin.booking.index') }}"
           class="nav-item {{ request()->routeIs('admin.booking.*') ? 'active' : '' }}">

            Penyewaan

        </a> --}}


        {{-- PELANGGAN --}}
        <a href="{{ route('admin.user.index') }}"
           class="nav-item {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">

            Pelanggan

        </a>


        {{-- LAPORAN --}}
        <a href="{{ route('admin.laporan.index') }}"
           class="nav-item {{ request()->routeIs('admin.laporan.*') ? 'active' : '' }}">

            Laporan

        </a>

    </nav>


    {{-- USER LOGIN --}}
    <div class="sidebar-foot">

        <div class="avatar">

            {{ strtoupper(substr(auth()->user()->username ?? 'AD', 0, 2)) }}

        </div>

        <div>

            <div class="who">
                {{ auth()->user()->username ?? 'Admin' }}
            </div>

            <div class="role">
                {{ ucfirst(auth()->user()->role ?? 'admin') }}
            </div>

        </div>

    </div>


    {{-- LOGOUT --}}
    <form action="{{ route('logout') }}" method="POST">

        @csrf

        <button type="submit"
                class="nav-item"
                style="border: none; background: transparent; text-align: left;">

            Keluar

        </button>

    </form>

</aside>