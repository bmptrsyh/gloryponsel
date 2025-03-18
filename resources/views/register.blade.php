<!-- resources/views/auth/login.blade.php -->
<x-layout title="Register - Glory Ponsel" text1="Sudah punya akun?" route="{{ route('login') }}" text2="Log In">
    <h2 class="text-2xl font-medium text-[#ECECEB] mb-4">Register</h2>
    <form action="{{ route('register.submit') }}" method="POST" class="space-y-4">
        @csrf
        <x-input type="text" name="name" placeholder="Nama Lengkap"/>
        <x-input type="email" name="email" placeholder="Email" required="true"/>
        <x-input type="password" name="password" placeholder="Password" required="true"/>
        <x-input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required="true"/>
        <x-input type="text" name="address" placeholder="Alamat Lengkap" required="true"/>
        <x-input type="number" name="phone" placeholder="Nomor Telepon" required="true"/>
        <button type="submit" class="w-full bg-[#EE3D3D] text-white py-3 rounded-lg text-lg font-medium hover:bg-red-600">Daftar</button>
    </form>  
</x-layout>

