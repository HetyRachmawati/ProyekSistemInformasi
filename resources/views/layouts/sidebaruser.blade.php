<div class="main-sidebar sidebar-style-2" style="background-color: #7A201F; color: white;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html" class="text-white font-bold">Sistem Informasi</a>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-th"></i> <span>Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('memberlist') }}" class="nav-link">
                    <i class="fas fa-users"></i> <span>Member List</span>
                </a>                    
            </li>
            <li>
                <a href="{{ route('report') }}" class="nav-link">
                    <i class="fas fa-bookmark"></i> <span>Report Activities</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="nav-link"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                </a>
            </li>
        </ul>

        <!-- Logout Form -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </aside>
</div>