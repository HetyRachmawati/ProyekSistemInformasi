<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Sistem Informasi &mdash; Activity</title>

  <title>@yield('title')</title>

 <!-- General CSS Files -->
<link rel="stylesheet" href="{{ asset('storage/assets/modules/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('storage/assets/modules/fontawesome/css/all.min.css') }}">

<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('storage/assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('storage/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('storage/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">

<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('storage/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('storage/assets/css/components.css') }}">

<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->

<style>
    .main-sidebar .sidebar-menu li a:hover {
        background-color: #b91c1c !important;
        color: white !important;
    }
    .main-sidebar .sidebar-menu li ul.dropdown-menu {
        background-color: #7A201F !important;
    }
    .main-sidebar .sidebar-menu li ul.dropdown-menu li a:hover {
        background-color: #b91c1c !important;
        color: white !important;
    }
    .sidebar-menu li a {
        color: white !important; 
    }
    .sidebar-menu li a:hover {
        color: #f5f5f5 !important; 
    }
    .sidebar-brand a {
        color: white !important; 
    }
</style>

</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar" style="background-color: #fff; color: white;">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
              <i class="fas fa-bars" style="color: #7A201F;"></i>
              <img src="{{ asset('storage/img/icon.png') }}" alt="Icon" style="width: 50px; height: 50px; margin-left: 20px;">
            </a>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
           
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep">
            <i class="far fa-envelope" style="color: #7A201F;"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b>
                    <p>Hello, Bro!</p>
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Dedik Sugiharto</b>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Agung Ardiansyah</b>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Ardian Rahardiansyah</b>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                    <div class="time">16 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Alfa Zulkarnain</b>
                    <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep">
            <i class="far fa-bell" style="color: #7A201F;"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="{{ asset('storage/assets/img/avatar/avatar-5.png') }}" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block" style="color: #7f1d1d;">Hi, {{ Auth::user()->nama_lengkap }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{ route('profile.edit', Auth::user()->id) }}" class="dropdown-item has-icon" style="color: #7f1d1d;">
                <i class="far fa-user"></i> Profile
            </a>
              <div class="dropdown-divider"></div>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="#" class="dropdown-item has-icon text-danger"
                    onclick="event.preventDefault(); this.closest('form').submit();" style="color: #7f1d1d;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </form>
            </div>
          </li>
        </ul>
        </nav>


           <!-- Sidebar Berdasarkan Role -->
           @if (Auth::user()->role == 'SuperAdmin')
           @include('layouts.sidebarbem') {{-- Sidebar untuk SuperAdmin --}}
       @elseif (Auth::user()->role == 'AdminOki')
           @include('layouts.sidebaroki') {{-- Sidebar untuk AdminOki --}}
       @elseif (Auth::user()->role == 'User')
           @include('layouts.sidebaruser') {{-- Sidebar untuk User --}}
       @endif
       
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            @yield('content')
        </section>
    </div>


      {{-- footer --}}
      <footer class="main-footer bg-gray-100 py-4 flex items-center justify-center">
  <div class="footer-content text-center">
    Copyright &copy; MI 3B 2024 <span class="bullet mx-2">•</span> Design By 
    <a href="https://nauval.in/" class="text-red-500 hover:underline">Kelompok 2</a>
  </div>
</footer>


 <!-- General JS Scripts -->
<script src="{{ asset('storage/assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('storage/assets/modules/popper.js') }}"></script>
<script src="{{ asset('storage/assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('storage/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('storage/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('storage/assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('storage/assets/js/stisla.js') }}"></script>

<!-- JS Libraries -->
<script src="{{ asset('storage/assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('storage/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('storage/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('storage/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('storage/assets/js/page/modules-datatables.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('storage/assets/js/scripts.js') }}"></script>
<script src="{{ asset('storage/assets/js/custom.js') }}"></script>




 <!-- SweetAlert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // SweetAlert Hapus
  function confirmDelete(event) {
      event.preventDefault();
      Swal.fire({
          title: "Apakah Anda yakin?",
          text: "Data yang dihapus tidak dapat dipulihkan!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya, hapus!",
          cancelButtonText: "Batal"
      }).then((result) => {
          if (result.isConfirmed) {
              Swal.fire({
                  title: "Dihapus!",
                  text: "Data Anda telah dihapus.",
                  icon: "success"
              }).then(() => {
                  event.target.submit();
              });
          }
      });
  }

  // SweetAlert Edit
  function confirmEdit(event) {
      event.preventDefault();
      Swal.fire({
          title: "Apakah Anda yakin ingin menyimpan perubahan?",
          text: "Perubahan yang disimpan akan diterapkan!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya, simpan!",
          cancelButtonText: "Batal"
      }).then((result) => {
          if (result.isConfirmed) {
              Swal.fire({
                  title: "Disimpan!",
                  text: "Perubahan Anda telah disimpan.",
                  icon: "success"
              }).then(() => {
                  event.target.submit();
              });
          }
      });
  }

  // SweetAlert Simpan
  function confirmSave(event) {
      event.preventDefault();
      Swal.fire({
          title: "Apakah Anda yakin ingin menyimpan data?",
          text: "Data yang disimpan tidak dapat diubah lagi!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya, simpan!",
          cancelButtonText: "Batal"
      }).then((result) => {
          if (result.isConfirmed) {
              Swal.fire({
                  title: "Tersimpan!",
                  text: "Data Anda telah disimpan.",
                  icon: "success"
              }).then(() => {
                  event.target.submit();
              });
          }
      });
  }


    // SweetAlert Setujui
    function confirmSetujui(event, id) {
    event.preventDefault(); 

    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Pastikan Anda sudah memeriksa proposal sebelum disetujui.",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, setujui!",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Disetujui!",
                text: "Proposal ini telah disetujui.",
                icon: "success"
            }).then(() => {
                setTimeout(function() {
                    document.getElementById('setujui-form-' + id).submit();
                }, 1000);  
            });
        }
    });
}



    // SweetAlert Tolak
    function confirmTolak(event, id) {
    event.preventDefault(); 
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Pastikan Anda ingin menolak proposal ini.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, tolak!",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Ditolak!",
                text: "Proposal ini telah ditolak.",
                icon: "error"
            }).then(() => {
                setTimeout(function() {
                    document.getElementById('tolak-form-' + id).submit();
                }, 1000); 
            });
        }
    });
}

</script>

@yield('scripts')






    
</body>
</html>