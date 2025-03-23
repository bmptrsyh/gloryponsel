<div>
    <h1>Halaman Awal</h1>
    <p>Selamat datang di halaman awal Anda.</p>
        <!-- Jika belum login, tampilkan tombol login -->
        <a
            href="{{ route('login') }}"
            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
        >
            Log in
        </a>
        <!-- Jika sudah login, tampilkan tombol logout -->
        <div class="mt-6 text-lg text-center">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-red-600 font-semibold hover:text-blue-600">
                    Log Out
                </button>
            </form>
        </div>
</div>
