<?php

namespace App\Http\Controllers\Customer;

use App\Models\Ponsel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PonselController extends Controller
{
    public function index() {
        $produk = Ponsel::all(); // Mengambil semua produk
        return view('customer.ponsel.index', compact('produk'));
    }

    public function show($id) {
        $produk = Ponsel::with(['ulasan' => function($query) {
        $query->orderBy('tanggal_ulasan', 'desc');
        }])->findOrFail($id);
        return view('customer.ponsel.show', compact('produk'));
    }
}
