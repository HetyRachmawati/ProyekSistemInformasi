<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">Profile</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">P</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Profile Menu</li>

        {{-- Sidebar untuk Super Admin --}}
        @if (Auth::user()->role === 'SuperAdmin')
            <li><a href="{{ route('super-admin.data_oki.index') }}" class="nav-link"><i class="fas fa-database"></i> <span>Data OKI</span></a></li>
            {{-- <li><a href="{{ route('super-admin.users') }}" class="nav-link"><i class="fas fa-users"></i> <span>Manage Users</span></a></li> --}}

        {{-- Sidebar untuk Admin OKI --}}
        @elseif (Auth::user()->role === 'AdminOki')
            {{-- <li><a href="{{ route('profile.index') }}" class="nav-link"><i class="fas fa-user"></i> <span>My Profile</span></a></li>
            <li><a href="{{ route('profile.edit') }}" class="nav-link"><i class="fas fa-user-edit"></i> <span>Edit Profile</span></a></li>
            <li><a href="{{ route('admin-oki.data_oki.index') }}" class="nav-link"><i class="fas fa-database"></i> <span>Data OKI</span></a></li>
            <li><a href="{{ route('admin-oki.reports') }}" class="nav-link"><i class="fas fa-file-alt"></i> <span>Reports</span></a></li> --}}

        {{-- Sidebar untuk Anggota --}}
        @elseif (Auth::user()->role === 'Anggota')
            {{-- <li><a href="{{ route('profile.index') }}" class="nav-link"><i class="fas fa-user"></i> <span>My Profile</span></a></li>
            <li><a href="{{ route('profile.edit') }}" class="nav-link"><i class="fas fa-user-edit"></i> <span>Edit Profile</span></a></li>
            <li><a href="{{ route('anggota.activities') }}" class="nav-link"><i class="fas fa-calendar-alt"></i> <span>Activities</span></a></li>
            <li><a href="{{ route('anggota.reports') }}" class="nav-link"><i class="fas fa-file"></i> <span>My Reports</span></a></li> --}}
        @endif

        <li><a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-home"></i> <span>Back to Dashboard</span></a></li>
    </ul>
</aside>
