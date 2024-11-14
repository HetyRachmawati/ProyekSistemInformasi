<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-red-900 to-white flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg p-8 flex items-center max-w-4xl w-full">
        <!-- Regis-->
        <div class="flex-1 ml-12">
            <h2 class="text-2xl font-semibold text-red-900 mb-2">Register</h2>
            <p class="text-gray-500 mb-6">Silahkan Register Terlebih Dahulu</p>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf

                    <!-- Nama Lengkap -->
                    <div class="mb-4">
                        <label for="nama_lengkap" class="block text-gray-700">Nama Lengkap</label>
                        <input 
                            id="nama_lengkap" 
                            class="block mt-1 w-full px-4 py-2 bg-red-100 border rounded-md placeholder-gray-400 text-gray-700 focus:outline-none" 
                            type="text" 
                            name="nama_lengkap" 
                            value="{{ old('nama_lengkap') }}" 
                            required 
                            placeholder="Nama Lengkap"
                        />
                        @error('nama_lengkap')
                            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                        @enderror
                    </div>


                    <!-- NIM -->
                <div class="mb-4">
                    <label for="nim" class="block text-gray-700">NIM</label>
                    <input 
                        id="nim" 
                        class="block mt-1 w-full px-4 py-2 bg-red-100 border rounded-md placeholder-gray-400 text-gray-700 focus:outline-none" 
                        type="text" 
                        name="nim" 
                        value="{{ old('nim') }}" 
                        required 
                        placeholder="NIM"
                    />
                    @error('nim')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input 
                        id="email" 
                        class="block mt-1 w-full px-4 py-2 bg-red-100 border rounded-md placeholder-gray-400 text-gray-700 focus:outline-none" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autocomplete="username" 
                        placeholder="Your Email"
                    />
                    @error('email')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input 
                        id="password" 
                        class="block mt-1 w-full px-4 py-2 bg-red-100 border rounded-md placeholder-gray-400 text-gray-700 focus:outline-none" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="new-password" 
                        placeholder="Your Password"
                    />
                    @error('password')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                    <input 
                        id="password_confirmation" 
                        class="block mt-1 w-full px-4 py-2 bg-red-100 border rounded-md placeholder-gray-400 text-gray-700 focus:outline-none" 
                        type="password" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password" 
                        placeholder="Confirm Your Password"
                    />
                    @error('password_confirmation')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Register  -->
                <div class="mb-4">
                    <button 
                        class="w-full bg-red-700 text-white rounded-md py-2 hover:bg-red-800 transition duration-300" 
                        type="submit"
                    >
                        Register
                    </button>
                </div>

                <!-- Already -->
                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Sudah punya akun? <a href="{{ route('login') }}" class="text-red-700 hover:underline">Log In</a>.
                    </p>
                </div>
            </form>
        </div>

        <!-- Logo -->
        <div class="flex-1 flex justify-center">
            <img src="/storage/img/icon.png" alt="Visioner Muda Logo" class="w-42 h-42 object-contain">
        </div>
    </div>
</body>
</html>
