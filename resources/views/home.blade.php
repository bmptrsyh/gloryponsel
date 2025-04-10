
       
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Glory Ponsel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }
        body {
            background-color: #fff;
            color: #333;
        }
        header {
            width: 100%;
            background-color: #fff;
            padding: 20px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
        }
        .logo {
            font-size: 22px;
            font-weight: 700;
        }
        nav {
            display: flex;
            gap: 30px;
            align-items: center;
        }
        nav a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }
        nav a:hover {
            color: #007bff;
        }
        .sign-in {
            background-color: #4F46E5;
            color: white;
            padding: 8px 18px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
        }
        .hero {
            padding: 80px 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .hero-text {
            max-width: 50%;
        }
        .hero-text h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .hero-text p {
            font-size: 16px;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .btn-primary {
            background-color: #4F46E5;
            color: #fff;
            padding: 12px 28px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #3730a3;
        }
        .hero-image {
            width: 45%;
            height: 300px;
            background-color: #ccc;
            border-radius: 12px;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">Glory Ponsel</div>
    <nav>
        <a href="#">Home</a>
        <a href="#">Produk</a>
        <a href="#">Tentang Kami</a>
        <a href="#">Kontak</a>
        <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" alt="Cart" width="20"></a>
        <a href="{{ route('login') }}" class="sign-in">Sign In</a>
    </nav>
</header>

<section class="hero">
    <div class="hero-text">
        <h1>Platform Ecommerce Terdepan di Indonesia</h1>
        <p>Kami percaya bahwa ReCommerce dapat meningkatkan standar hidup masyarakat Kelas Menengah dengan harga terjangkau.</p>
        <a href="#" class="btn-primary">Beli Sekarang</a>
    </div>
    <div class="hero-image"></div>
</section>

<section style="background-color: #f9f9f9; padding: 60px;">
  <!-- Bagian Statistik -->
<div style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap; padding: 40px 20px; background-color: #f9f9f9;">
  
    <div style="text-align: center;">
        <img src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" alt="Icon" width="32">
        <p style="font-size: 16px; font-weight: 600;">10 Juta</p>
        <p style="font-size: 14px; color: #555;">barang yang sudah dikirim</p>
    </div>

    <div style="text-align: center;">
        <img src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" alt="Icon" width="32">
        <p style="font-size: 16px; font-weight: 600;">10 Juta</p>
        <p style="font-size: 14px; color: #555;">pelanggan aktif</p>
    </div>

    <div style="text-align: center;">
        <img src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" alt="Icon" width="32">
        <p style="font-size: 16px; font-weight: 600;">10 Juta</p>
        <p style="font-size: 14px; color: #555;">ulasan positif</p>
    </div>

    <div style="text-align: center;">
        <img src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" alt="Icon" width="32">
        <p style="font-size: 16px; font-weight: 600;">10 Juta</p>
        <p style="font-size: 14px; color: #555;">pengunjung bulanan</p>
    </div>

</div>


    <!-- Konten Utama -->
    <div style="display: flex; gap: 60px; align-items: center;">
        <!-- Ilustrasi Placeholder -->
        <div style="flex: 1; height: 300px; background-color: #ccc; border-radius: 12px;"></div>
        <img src="image/img-marketplace.png" alt="a">
        <!-- Teks -->
        <div style="flex: 1;">
            <h2 style="font-size: 24px; font-weight: 700; margin-bottom: 16px;">
                Marketplace yang menghubungkan pemilik gadget preloved dengan pelaku bisnis.
            </h2>
            <p style="margin-bottom: 20px; line-height: 1.6;">
                Glory Ponsel mengembangkan dan menjalankan berbagai macam Platform dan Teknologi, yang memfasilitasi ekosistem pasar C2B (Consumer to Business), dimana individu dapat menjual gadgetnya kepada ribuan pembeli dengan Cepat, Aman, dan Mudah.
            </p>
            <ul style="line-height: 1.8;">
                <li><strong>Pasti Terjual</strong>, ribuan pembeli memiliki banyak daftar barang yang mereka inginkan</li>
                <li><strong>Kecepatan</strong>, ribuan pembeli di platform kami siap membeli tanpa negosiasi</li>
                <li><strong>Aman dan Mudah</strong>, kami menyediakan layanan seperti penjemputan dari penjual, pengecekan kondisi, dan pengantaran ke pembeli</li>
            </ul>
        </div>
    </div>
</section>

<!-- Produk Terbaru -->
<section style="padding: 60px 20px; background-color: #fff; text-align: center;">
    <h2 style="font-size: 24px; font-weight: 700; margin-bottom: 30px;">Produk Terbaru</h2>

    <div style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap;">
        @forelse ($produkTerbaru as $produk)
        <div style="width: 180px; background-color: #f5f5f5; padding: 15px; border-radius: 12px;">
            <img src="{{ asset($produk->gambar) }}" alt="{{ $produk->model }}" style="width: 100%; border-radius: 8px;">
                <p style="margin-top: 10px; font-weight: bold;">{{ $produk->merk }} {{ $produk->model }}</p>
        </div>
        @empty
            <p>Tidak ada produk terbaru.</p>
        @endforelse
    </div>
</section>




<!-- Ulasan Pelanggan -->
<section style="padding: 60px 20px; background-color: #f9f9f9; text-align: center;">
    <h2 style="font-size: 24px; font-weight: 700; margin-bottom: 30px;">Ulasan Pelanggan</h2>
    <div style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap;">
        
        <div style="width: 280px; background-color: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
            <img src="https://cdn-icons-png.flaticon.com/512/147/147144.png" alt="User Icon" width="40" style="margin-bottom: 10px;">
            <p style="font-style: italic;">"Website ini keren sekali saya sangat puas dalam memakai website ini, dan saya akan merekomendasikannya ke teman-teman saya"</p>
        </div>

        <div style="width: 280px; background-color: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
            <img src="https://cdn-icons-png.flaticon.com/512/147/147144.png" alt="User Icon" width="40" style="margin-bottom: 10px;">
            <p style="font-style: italic;">"Website ini keren sekali saya sangat puas dalam memakai website ini, dan saya akan merekomendasikannya ke teman-teman saya"</p>
        </div>

        <div style="width: 280px; background-color: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
            <img src="https://cdn-icons-png.flaticon.com/512/147/147144.png" alt="User Icon" width="40" style="margin-bottom: 10px;">
            <p style="font-style: italic;">"Website ini keren sekali saya sangat puas dalam memakai website ini, dan saya akan merekomendasikannya ke teman-teman saya"</p>
        </div>

    </div>
</section>



<!-- Footer -->
<footer style="background-color: #111; color: #fff; padding: 60px 20px;">
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 30px; max-width: 1200px; margin: auto;">
        
        <!-- Kolom 1: Deskripsi -->
        <div style="flex: 1; min-width: 250px;">
            <h3 style="font-weight: bold;">Glory Ponsel</h3>
            <p style="line-height: 1.6;">is the leading ReCommerce Platform in Indonesia. We believe ReCommerce can help Emerging Middle-Class to upgrade their lifestyle, at affordable prices.</p>
        </div>

        <!-- Kolom 2: Useful Links -->
        <div style="flex: 1; min-width: 200px;">
            <h4 style="margin-bottom: 10px;">USEFUL LINKS</h4>
            <ul style="list-style: none; padding: 0;">
                <li><a href="#" style="color: #fff; text-decoration: none;">• Home</a></li>
                <li><a href="#" style="color: #fff; text-decoration: none;">• Produk</a></li>
                <li><a href="#" style="color: #fff; text-decoration: none;">• Tentang Kami</a></li>
                <li><a href="#" style="color: #fff; text-decoration: none;">• Kontak</a></li>
            </ul>
        </div>

        <!-- Kolom 3: Contact -->
        <div style="flex: 1.5; min-width: 250px;">
            <h4 style="margin-bottom: 10px;">CONTACT US</h4>
            <p>PT. Laku6 Online Indonesia<br>
            Jl. Lapangan Bola No.5, RT.3/RW.1, Kebon Jeruk, West Jakarta City, Jakarta 11530, Indonesia<br>
            Telp: 085882105531<br>
            Email: Gloryonsel@gmail.com</p>
        </div>

        <!-- Kolom 4: Pengaduan -->
        <div style="flex: 1.5; min-width: 250px;">
            <h4 style="margin-bottom: 10px;">LAYANAN PENGADUAN KONSUMEN</h4>
            <p>Direktorat Jenderal Perlindungan Konsumen dan Tertib Niaga<br>
            Kementerian Perdagangan RI<br>
            Whatsapp: 085311111010</p>
        </div>
    </div>

    <div style="text-align: center; padding-top: 40px; color: #aaa;">
        <small>Copyright &copy; 2025 Made by Team</small>
    </div>
</footer>

</body>
</html>