<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ponsel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePonselRequest;

class PonselController extends Controller
{
    public function index () {
        $produkBaru = Ponsel::where('status', 'baru')->get();
        $produkBekas = Ponsel::where('status', 'bekas')->get();

        return view('admin.ponsel.index', compact('produkBaru', 'produkBekas'));
    }

    public function create () {
        return view('admin.ponsel.create');
    }

    public function store (StorePonselRequest $request) {
        $validated = $request->validated();

        $gambarPath = $request->file('gambar')->store('gambar/ponsel', 'public');

        Ponsel::create(array_merge($validated, [
            'gambar' => 'storage/' . $gambarPath,
        ]));

        return redirect()->route('admin.ponsel.index')->with('success', 'Ponsel berhasil ditambahkan!');
    }


    public function edit ($id) {
        $ponsel = Ponsel::findOrFail($id);
        return view('admin.ponsel.edit', compact('ponsel'));
    }

    public function update (StorePonselRequest $request, $id) {
        $ponsel = Ponsel::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('gambar')) {
            if ($ponsel->gambar && Storage::disk('public')->exists(str_replace('storage/', '', $ponsel->gambar))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $ponsel->gambar));
            }
        
            $gambarPath = $request->file('gambar')->store('gambar/ponsel', 'public');
            $validated['gambar'] = 'storage/' . $gambarPath;
        }
        

        $ponsel->update($validated);

        return redirect()->route('admin.ponsel.index')->with('success', 'Produk berhasil diperbarui.');
    }

}
