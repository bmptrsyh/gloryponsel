@extends('layouts.layout_home')
@section('content')


  <!-- Search -->
  <div class="container mx-auto mt-8 px-4">
    <input type="text" placeholder="Cari barang yang anda inginkan..." class="w-full p-3 border rounded-lg" />
  </div>

  <!-- Produk Unggulan -->
  <section class="container mx-auto px-4 mt-10 mb-10">
    <h2 class="text-lg font-semibold mb-4">Produk Kami</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
      <!-- Card Produk -->
        @forelse ($produk as $produk)
        <a href="{{ route('produk.show', $produk->id_ponsel) }}">
      <div class="bg-white shadow rounded-lg p-3 text-center">
        <img src="{{ asset($produk->gambar) }}" class="mx-auto mb-2 h-48 w-48 object-contain" alt="{{ $produk->model }}">
        <p class="font-semibold">{{ $produk->merk }} {{ $produk->model }}</p>
        <p class="text-sm text-gray-600">Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}</p>
        <div class="text-yellow-400 text-sm mt-1">⭐ 4.2 (17 ulasan)</div>
      </div>
      </a>
      @empty
      <p>Tidak ada produk terbaru.</p>
  @endforelse
      <!-- Ulangi sesuai kebutuhan -->
    </div>
  </section>

@endsection