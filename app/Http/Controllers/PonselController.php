<?php

namespace App\Http\Controllers;

use App\Models\Ponsel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PonselController extends Controller
{
    public function create()
    {
        return view('ponsel.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'merk' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'harga_jual' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'stok' => 'required|integer',
            'status' => 'required|in:baru,bekas',
            'processor' => 'required|string|max:255',
            'dimension' => 'required|string|max:255',
            'ram' => 'required|integer',
            'storage' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambarPath = $request->file('gambar')->store('gambar/ponsel', 'public');

        Ponsel::create(array_merge($validated, [
            'gambar' => 'storage/' . $gambarPath,
        ]));

        return redirect()->route('ponsel.create')->with('success', 'Ponsel berhasil ditambahkan!');
    }
}
