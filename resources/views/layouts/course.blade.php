<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Template Proposal UKM</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-gray-100">

<!-- Navbar -->
<nav class="bg-white shadow-md">
    <div class="container mx-auto flex justify-between items-center py-4 px-6"> 
      <div class="md:hidden flex items-center space-x-4">
        <button id="hamburger-icon" class="text-gray-600">
          <i class="fas fa-bars text-2xl"></i>
        </button>
      </div>
      <a href="#" class="text-red-700 font-bold text-xl flex items-center space-x-2">
        <img src="{{ asset('storage/img/icon.png') }}" alt="Logo" class="h-8">
        <span>BEM PSDKU</span>
      </a>
      
      <!-- Desktop Menu -->
      <div class="hidden md:flex space-x-6">
        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-red-700">Home</a>
        <a href="{{ route('course') }}" class="btn btn-primary hover:text-red-700">See course</a>
        <a href="{{ route('announcements') }}" class="text-gray-600 hover:text-red-700">Announcements</a>
      </div>  

      <!-- Profile Dropdown and Logout -->
      <div class="flex items-center space-x-4 relative">
        <span class="text-gray-600">Hi, {{ Auth::user()->nama_lengkap }}</span>
        <i class="fas fa-user-circle text-gray-600 text-2xl"></i>
        
        <!-- Dropdown Menu -->
        <div class="relative">
          <button class="text-gray-600 hover:text-red-700 focus:outline-none">
            <i class="fas fa-caret-down text-lg"></i> <!-- Dropdown arrow -->
          </button>
          
          <!-- Dropdown Menu Items -->
          <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg border border-gray-200 hidden">
            <a href="{{ route('profile.edit', Auth::user()->id) }}" class="dropdown-item has-icon text-gray-600 px-4 py-2">
              <i class="far fa-user"></i> Profile
            </a>
            <div class="dropdown-divider my-1"></div>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a href="#" class="dropdown-item has-icon text-danger text-gray-600 px-4 py-2"
                  onclick="event.preventDefault(); this.closest('form').submit();">
                  <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-white shadow-md w-full space-y-4 px-6 py-4">
      <a href="{{ route('dashboard') }}" class="block text-gray-600 hover:text-red-700">Home</a>
      <a href="{{ route('course') }}" class="block text-gray-600 hover:text-red-700">See course</a>
      <a href="{{ route('announcements') }}" class="block text-gray-600 hover:text-red-700">Announcements</a>
    </div>
</nav>

<!-- Hero Section -->
<section class="bg-red-700 text-white py-40 mb-20">
    <div class="container mx-auto text-center">
      <h1 class="text-5xl font-bold">Template Proposal Kegiatan UKM 2024</h1>
      <p class="mt-2 text-sm">Home / Course - Format Proposal Kegiatan - Template Proposal Kegiatan UKM 2024</p>
    </div>
</section>

<!-- Main Content -->
<section class="container mx-auto my-8 px-8">
    <div class="bg-white shadow-md rounded-lg p-6 flex items-start space-x-8 transform transition-transform duration-300 hover:scale-105">
        <img src="{{ asset('storage/img/icon.png') }}" alt="Template Icon" class="w-40 h-45 object-cover">
        <div>
            <h2 class="text-xl font-bold mt-7">Template Proposal Kegiatan UKM 2024</h2>
            <p class="text-gray-500 text-sm mb-4">Format/Template</p>
            <p class="text-gray-700 mb-6">Template ini bertujuan sebagai dasar kalian untuk menyusun laporan yang ada di UKM selama periode 2024. Proposal ini dapat digunakan dalam semua kegiatan dan terutama kegiatan "WAJIB" dari BEM. Template ini diharapkan dapat kalian kembangkan lebih jauh lagi isinya, dan dapat kalian atur tambahan tema serta design papernya agar menarik perhatian atau eye-catching. Thanks All ~min Han</p>
        </div>
    </div>
</section>

<!-- Home -->
<section class="container mx-auto px-6 mb-40"> 
    <h3 class="text-2xl font-bold mb-4">Template</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($homes as $home)
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex justify-center items-center transform transition duration-300 ease-in-out hover:scale-105">
                <img src="{{ asset('uploads/'.$home->gambar) }}" alt="Course Image" class="w-full h-32 object-cover ml-4">
                <div class="p-4">
                    <h4 class="font-bold text-lg">{{ $home->judul }}</h4>
                    <p class="text-gray-500 text-sm mb-4">{{ $home->deskripsi }}</p>
                    <a href="{{ $home->link_template }}" target="_blank" class="bg-red-700 text-white py-2 px-4 rounded hover:bg-red-800">
                        Lihat Template
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Footer -->
<footer class="bg-red-800 text-white py-8 mt-10">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 ml-8">
        <div>
            <h4 class="font-bold mb-2">Address</h4>
            <p>Kampus 1</p>
            <p>Jl. Mayor Bismo No. 27, Kota Kediri, Jawa Timur 64121</p>
            <p>Kampus 2</p>
            <p>Jl. Lingkar Maskumambang, No. 1 Kota Kediri, Jawa Timur 64114</p>
        </div>
        <div>
            <h4 class="font-bold mb-2">Contact</h4>
            <p>Email: bempsdkukediri@gmail.com</p>
            <p>Phone: 081-920-129</p>
        </div>
        <div>
            <h4 class="font-bold mb-2">Programs</h4>
            <p>BEM Polinema PSDKU Kediri adalah organisasi mahasiswa...</p>
        </div>
    </div>
    <div class="text-center mt-6 text-sm">
        Copyright &copy; MI 28 2024 • Design By Kelompok 2
    </div>
</footer>

<script>
  document.querySelector('.relative').addEventListener('click', function() {
    let menu = this.querySelector('.dropdown-menu');
    menu.classList.toggle('hidden');
  });

  document.getElementById('hamburger-icon').addEventListener('click', function() {
  const mobileMenu = document.getElementById('mobile-menu');
  mobileMenu.classList.toggle('hidden');
});
</script>

</body>

</html>
