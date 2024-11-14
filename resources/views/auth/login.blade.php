<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-red-900 to-white flex items-center justify-center">
  <div class="bg-white rounded-lg shadow-lg p-8 flex items-center max-w-4xl w-full border border-red-900 relative"> <!-- Garis tepi pada card -->
    <!-- Logo -->
    <div class="flex-1 flex justify-center">
      <img src="/storage/img/icon.png" alt="Visioner Muda Logo" class="w-42 h-42 object-contain">
    </div>

    <!-- Login -->
    <div class="flex-1 ml-12">
      <h2 class="text-2xl font-semibold text-red-900 mb-2">Selamat Datang</h2>
      <p class="text-gray-500 mb-6">Silakan Input Email dan Password kamu!</p>
      <form method="POST" action="{{ route('login') }}">
        @csrf
    
        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700">{{ __('Email') }}</label>
            <input 
                id="email" 
                class="block mt-1 w-full px-4 py-2 bg-red-100 border rounded-md placeholder-gray-400 text-gray-700 focus:outline-none focus:border-red-900" 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                required 
                autofocus 
                autocomplete="username" 
                placeholder="Your Email"
            />
            @error('email')
                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
            @enderror
        </div>
    
        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-gray-700">{{ __('Password') }}</label>
            <input 
                id="password" 
                class="block mt-1 w-full px-4 py-2 bg-red-100 border rounded-md placeholder-gray-400 text-gray-700 focus:outline-none focus:border-red-900" 
                type="password" 
                name="password" 
                required 
                autocomplete="current-password" 
                placeholder="Your Password"
            />
            @error('password')
                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col items-center justify-center mt-4">
            <!-- Login -->
            <button 
                class="w-full bg-red-700 text-white rounded-md py-2 hover:bg-red-800 transition duration-300" 
                type="submit"
            >
                {{ __('Login') }}
            </button>
        </div>
    </form>

  
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const inputs = document.querySelectorAll('input[type="email"], input[type="password"]');

      inputs.forEach(input => {
        input.addEventListener('blur', function() {
          if (input.value !== '') {
            input.classList.add('border-red-900');
          } else {
            input.classList.remove('border-red-900');
          }
        });

        input.addEventListener('focus', function() {
          input.classList.add('border-red-900');
        });
      });
    });
  </script>
</body>
</html>
