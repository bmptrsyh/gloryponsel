<?php

namespace App\Http\Controllers;

use App\Models\Ponsel;
use App\Models\Customer;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        
        $produkTerbaru = Ponsel::orderBy('created_at', 'desc')->take(4)->get();

        // Ambil data customer yang sedang login
        $customer = Auth::user();
    
        return view('home', compact('produkTerbaru', 'customer'));
    }
}
