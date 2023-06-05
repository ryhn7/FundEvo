<?php

namespace App\Http\Controllers;

use App\Models\KategoriItem;
use App\Models\Item;
use Illuminate\Http\Request;

class KategoryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('TokoListrik.kategori.index', [
            'kategoris' => KategoriItem::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('TokoListrik.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'kategori' => 'required|max:25|unique:kategori_items'
        ], [
            'kategori.unique' => 'Kategori sudah terdaftar',
        ]);

        KategoriItem::create($validated);

        return redirect('/kategori')->with('success', 'Data Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriItem  $kategoriItem
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriItem $kategoriItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriItem  $kategoriItem
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriItem $kategori)
    {
        //
        return view('TokoListrik.kategori.edit', [
            'KategoriItem' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriItem  $kategoriItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriItem $kategori)
    {
        //
        $rules = [
            'kategori' => 'required|max:25',
        ];

        $validated = $request->validate($rules);

        KategoriItem::where('id', $kategori->id)
            ->update($validated);

        return redirect('/kategori')->with('success', 'Data kategori berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriItem  $kategoriItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriItem $kategori)
    {
        //
        $itemExists = Item::where('kategori', $kategori->id)->exists();
        if ($itemExists) {
            return redirect('/kategori')->with('error', 'Tidak dapat menghapus kategori karena item terkait masih ada!');
        }
        KategoriItem::destroy($kategori->id);
        return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus!');
    
    }
}
