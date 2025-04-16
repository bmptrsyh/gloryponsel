<x-dashboard>
     <!-- Produk Baru -->
     <div class="flex justify-between items-center mb-4">
        <!-- Kiri: Judul atau bisa dikosongkan -->
        <h2 class="text-xl font-semibold mb-4">Produk Baru</h2>
      
        <!-- Kanan: Tombol Aksi -->
        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.ponsel.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                Tambah Produk
            </a>
            <button class="border border-gray-300 px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                Filter By
            </button>
        </div>
      </div>
     <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
       <!-- Card Product -->
       @forelse($produkBaru as $produk)
       <div class="bg-white p-4 rounded-xl shadow-md flex flex-col h-full">
         <img src="{{ asset($produk->gambar) }}" alt="{{ $produk->model }}" class="rounded-xl mb-4 h-40 object-contain">
         <h3 class="font-semibold">{{ $produk->merk }} {{ $produk->model }}</h3>
         <p class="text-blue-500 font-semibold">Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}</p>
         <div class="flex items-center text-yellow-400 text-sm mb-3">
           ★★★★☆ <span class="text-gray-400 ml-2">(131)</span>
         </div>
         <div class="mt-auto flex space-x-2">
          {{-- Tombol Edit --}}
          <a href="{{ route('admin.ponsel.edit', $produk->id_ponsel) }}" 
             class="bg-blue-100 text-blue-700 px-3 py-1 rounded-lg text-sm">
              Edit Product
          </a>
      
          {{-- Tombol Hapus --}}
          <form action="#" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-100 text-red-700 px-3 py-1 rounded-lg text-sm">
                  Hapus Product
              </button>
          </form>
      </div>
      
       </div>
       @empty
       <p class="text-gray-500">Tidak ada produk baru.</p>
       @endforelse
     </div>

     <!-- Produk Bekas -->
     <h2 class="text-xl font-semibold mb-4">Produk Bekas</h2>
     <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
       <!-- Card Product (sama seperti sebelumnya) -->
       @forelse($produkBekas as $produk)
       <div class="bg-white p-4 rounded-xl shadow-md flex flex-col h-full">
         <img src="{{ asset($produk->gambar) }}" alt="{{ $produk->model }}" class="rounded-xl mb-4 h-40 object-contain">
         <h3 class="font-semibold">{{ $produk->merk }} {{ $produk->model }}</h3>
         <p class="text-blue-500 font-semibold">Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}</p>
         <div class="flex items-center text-yellow-400 text-sm mb-3">
           ★★★★☆ <span class="text-gray-400 ml-2">(131)</span>
         </div>
         <div class="mt-auto flex space-x-2">
           <button class="bg-blue-100 text-blue-700 px-3 py-1 rounded-lg text-sm">Edit Product</button>
           <button class="bg-red-100 text-red-700 px-3 py-1 rounded-lg text-sm">Hapus Product</button>
         </div>
       </div>
       @empty
       <p class="text-gray-500">Tidak ada produk baru.</p>
       @endforelse
       </div>
     </div>
  </x-dashboard>