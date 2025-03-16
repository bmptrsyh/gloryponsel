<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Glory Ponsel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#EC6302] flex items-center justify-center min-h-screen">
    <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-md">
        <h1 class="text-4xl font-bold text-black mb-4 text-center">Welcome to Glory Ponsel</h1>
        
        <h2 class="text-2xl font-medium text-black mb-4">Log In</h2>
        @if ($errors->any())
            <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
                {{ $errors->first('login') }}
            </div>
        @endif
        <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="login" placeholder="Nomor Telepon/Username/Email" class="w-full p-4 border border-gray-300 rounded-lg text-lg" required>
            <input type="password" name="password" placeholder="Password" class="w-full p-4 border border-gray-300 rounded-lg text-lg" required>
            <button type="submit" class="w-full bg-red-500 text-white py-3 rounded-lg text-lg font-medium hover:bg-red-600">LOG IN</button>
        </form>
        
        <div class="relative my-6 text-center">
            <div class="absolute left-0 top-1/2 w-1/3 border-t border-gray-300"></div>
            <span class="text-gray-600 text-lg px-3">ATAU</span>
            <div class="absolute right-0 top-1/2 w-1/3 border-t border-gray-300"></div>
        </div>
        
        <div class="space-y-4">
            <a href="#" class="w-full block bg-white text-black py-3 rounded-lg text-lg text-center shadow-md">Continue with Google</a>
            <a href="#" class="w-full block bg-white text-black py-3 rounded-lg text-lg text-center shadow-md">Continue with Facebook</a>
        </div>
        
        <div class="mt-6 text-lg text-center">
            <span class="text-gray-600">Belum Punya Akun?</span> 
            <a href="#" class="text-red-600 font-semibold">Daftar</a>
        </div>
    </div>
</body>
</html>
