<div class="main-sidebar sidebar-style-2" style="background-color: #7A201F; color: white;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html" class="text-white font-bold">Sistem Informasi</a>
        </div>
        <ul class="sidebar-menu">
            <!-- Dashboard -->
            <li class="menu-header text-white">Dashboard</li>
            <li class="dropdown">
                <a href="" class="nav-link has-dropdown text-white">
                    <i class="fas fa-fire"></i> <span>Dashboard</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link text-white" href="{{ route('admin-oki.dashboard') }}">Home</a></li>
                </ul>
            </li>

            <!-- Data Anggota -->
            <li class="menu-header text-white">Data Anggota</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown text-white">
                    <i class="far fa-user"></i> <span>Keanggotaan</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link text-white" href="{{ route('memberlist') }}">Member List</a></li>
                    <li><a class="nav-link text-white" href="{{ route('admin-oki.anggota.index') }}">Data Keanggotaan</a></li>
                </ul>
            </li>


             <!-- Data Activity -->
             <li class="menu-header text-white">Data Activity</li>
             <li class="dropdown">
                 <a href="#" class="nav-link has-dropdown text-white">
                     <i class="far fa-file-alt"></i> <span>Activity</span>
                 </a>
                 <ul class="dropdown-menu">
                     <li><a class="nav-link text-white" href="{{ route('admin-oki.report.index') }}">Data Report</a></li>
                    <li><a class="nav-link text-white" href="{{ route('admin-oki.manajemen_kegiatan.index') }}">Data Manajemen</a></li>
                 </ul>
             </li>
             


            <!-- Data Organisasi -->
            <li class="menu-header text-white">Data Organisasi</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown text-white">
                    <i class="fas fa-sitemap"></i> <span>Organisasi</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link text-white" href="{{ route('admin-oki.data_oki.index') }}">Data Oki</a></li>
                    <li><a class="nav-link text-white" href="{{ route('admin-oki.data_divisi.index') }}">Data Divisi</a></li>
                </ul>
            </li>

        
        </ul>
    </aside>
</div>