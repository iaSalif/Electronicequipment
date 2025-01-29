<header class="admin-header">
    <div class="logo">
        <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
    </div>
    <div class="user-menu">
        <span>Bonjour, BAYO</span>
        {{-- <span>Bonjour, {{ Auth::user()->name }}</span> --}}
        {{-- <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a> --}}
        {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form> --}}
    </div>
</header>
