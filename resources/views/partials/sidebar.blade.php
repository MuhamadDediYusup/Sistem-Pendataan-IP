<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="p-2 shadow-sm {{ $title == 'Home' ? 'bg-primary' : '' }}">
            <a class="nav-link text-decoration-none {{ $title == 'Home' ? 'text-white' : '' }}" href="{{ url('') }}">
                <i class="typcn typcn-device-desktop menu-icon mr-3"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="p-2 shadow-sm {{ $title == 'Pendataan' ? 'bg-primary' : '' }}">
            <a class="nav-link text-decoration-none {{ $title == 'Pendataan' ? 'text-white' : '' }}" href="{{ route('pendataan') }}">
                <i class="typcn typcn-mortar-board menu-icon mr-3"></i>
                <span class="menu-title">Pendataan</span>
            </a>
        </li>

        @if (Auth::user()->role == 'admin')
        <li class="p-2 shadow {{ $title == 'Rekap' ? 'bg-primary' : '' }}">
            <a class="nav-link text-decoration-none {{ $title == 'Rekap' ? 'text-white' : '' }}" href="{{ route('rekap') }}">
                <i class="typcn typcn-mortar-board menu-icon mr-3"></i>
                <span class="menu-title">Rekap Data</span>
            </a>
        </li>
        @endif
    </ul>
</nav>
