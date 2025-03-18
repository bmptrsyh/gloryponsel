<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Glory Ponsel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#10316B] flex items-center justify-center min-h-screen">
    <div class="w-full max-w-lg p-8 rounded-lg">
        <h1 class="text-4xl font-bold text-[#ECECEB] mb-4 text-center">Welcome to Glory Ponsel</h1>
        
        <h2 class="text-2xl font-medium text-[#ECECEB] mb-4">Register</h2>
        @if ($errors->any())
            <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
                {{ $errors->first('register') }}
            </div>
        @endif
        <form action="#" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="name" placeholder="Nama" class="w-full p-4 border border-gray-300 rounded-lg text-lg" required>
            <input type="email" name="email" placeholder="Email" class="w-full p-4 border border-gray-300 rounded-lg text-lg" required>
            <input type="password" name="password" placeholder="Password" class="w-full p-4 border border-gray-300 rounded-lg text-lg" required>
            <input type="password" name="re-password" placeholder="Konfirmasi Password" class="w-full p-4 border border-gray-300 rounded-lg text-lg" required>
            <input type="text" name="address" placeholder="Alamat" class="w-full p-4 border border-gray-300 rounded-lg text-lg" required>
            <input type="number" name="Phone" placeholder="No. Telp" class="w-full p-4 border border-gray-300 rounded-lg text-lg" required>
            <button type="submit" class="w-full bg-[#EE3D3D] text-white py-3 rounded-lg text-lg font-medium hover:bg-red-600">LOG IN</button>
        </form>
        
        <div class="relative my-6 text-center">
            <div class="absolute left-0 top-1/2 w-1/3 border-t border-[#ECECEB]"></div>
            <span class="text-light text-[#ECECEB] px-3">ATAU</span>
            <div class="absolute right-0 top-1/2 w-1/3 border-t border-[#ECECEB]"></div>
        </div>
        
        <div class="space-y-4">
            <a href="#" class="w-full block bg-white text-black py-3 rounded-lg text-lg text-center shadow-md hover:bg-red-600">Continue with Google</a>
            <a href="#" class="w-full block bg-white text-black py-3 rounded-lg text-lg text-center shadow-md hover:bg-red-600">Continue with Facebook</a>
        </div>
        
        <div class="mt-6 text-lg text-center">
            <span class="text-[#ECECEB]">Sudah punya akun?</span> 
            <a href="{{ route('login') }}" class="text-red-600 font-semibold hover:text-blue-600">Log In</a>
        </div>
    </div>
</body>
</html>
