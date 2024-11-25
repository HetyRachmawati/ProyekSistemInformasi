<div class="main-sidebar sidebar-style-2" style="background-color: #7A201F; color: white;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html" style="color: white; font-weight: bold;">Sistem Informasi</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html" style="color: white; font-weight: normal;">Si</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header" style="color: white; font-weight: normal;">Dashboard</li>
            <li class="dropdown">
                <a href="{{ route('super-admin.dashboard') }}" class="nav-link has-dropdown" style="color: white; font-weight: normal;">
                    <i class="fas fa-fire"></i><span>Dashboard</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('super-admin.dashboard') }}" style="color: white; font-weight: normal;">Dashboard</a></li>
                    <li><a class="nav-link" href="{{ route('super-admin.home.index') }}" style="color: white; font-weight: normal;">Home</a></li>
                </ul>
            </li>
            <li class="menu-header" style="color: white; font-weight: normal;">Data Anggota</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" style="color: white; font-weight: normal;">
                    <i class="far fa-user"></i> <span>Keanggotaan</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('memberlist') }}" style="color: white; font-weight: normal;">Member List</a></li>
                    <li><a class="nav-link" href="{{ route('super-admin.anggota.index') }}" style="color: white; font-weight: normal;">Data Keanggotaan</a></li>
                </ul>
            </li>

            <li class="menu-header" style="color: white; font-weight: normal;">Data Activity</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" style="color: white; font-weight: normal;">
                    <i class="far fa-file-alt"></i> <span>Activity</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('super-admin.report.index') }}" style="color: white; font-weight: normal;">Report Activity</a></li>
                    <li><a class="nav-link" href="{{ route('super-admin.manajemen_kegiatan.index') }}" style="color: white; font-weight: normal;">Manajemen Kegiatan</a></li>
                </ul>
            </li>

            <li class="menu-header" style="color: white; font-weight: normal;">Data Divisi Oki</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" style="color: white; font-weight: normal;">
                    <i class="far fa-user"></i> <span>Divisi</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('super-admin.data_divisi.index') }}" style="color: white; font-weight: normal;">Data Divisi</a></li>
                    <li><a class="nav-link" href="{{ route('super-admin.data_oki.index') }}" style="color: white; font-weight: normal;">Data Oki</a></li>
                </ul>
            </li>
        </ul>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <!-- Tambahan lainnya -->
        </div>
    </aside>
</div>
