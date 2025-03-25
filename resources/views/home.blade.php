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
</div>      <!-- Jika belum login, tampilkan tombol login -->

       
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glory Ponsel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #77aaff 3px solid;
        }
        header h1 {
            text-align: center;
            margin: 0;
            padding-bottom: 10px;
        }
        .content {
            padding: 20px;
            background: #fff;
            margin-top: 20px;
        }
        .product, .feature {
            margin-bottom: 20px;
        }
        .product h3, .feature h3 {
            color: #333;
        }
        .product p, .feature p {
            color: #555;
        }
        .product img, .feature img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Welcome to Glory Ponsel</h1>
        </div>
    </header>

    <div class="container content">
        <h2>Produk Utama Kami</h2>
        <div class="product">
            <h3>Woven E5</h3>
            <img src="https://via.placeholder.com/400x200?text=Woven+E5" alt="Woven E5">
            <p>Detail</p>
        </div>
        <div class="product">
            <h3>U2.232</h3>
            <img src="https://via.placeholder.com/400x200?text=U2.232" alt="U2.232">
            <p>Detail</p>
        </div>
        <div class="product">
            <h3>Wor 16</h3>
            <img src="https://via.placeholder.com/400x200?text=Wor+16" alt="Wor 16">
            <p>Detail</p>
        </div>

        <h2>Fitur-fitur</h2>
        <div class="feature">
            <h3>Jual HP</h3>
            <img src="https://via.placeholder.com/400x200?text=Jual+HP" alt="Jual HP">
        </div>
        <div class="feature">
            <h3>Takur Tunibah HP</h3>
            <img src="https://via.placeholder.com/400x200?text=Takur+Tunibah+HP" alt="Takur Tunibah HP">
        </div>
        <div class="feature">
            <h3>Kredit HP</h3>
            <img src="https://via.placeholder.com/400x200?text=Kredit+HP" alt="Kredit HP">
        </div>
    </div>
</body>
</html>
