<?php

namespace App\Http\Controllers;

use App\Models\KategoriItem;
use App\Http\Requests\StoreKategoriItemRequest;
use App\Http\Requests\UpdateKategoriItemRequest;

class KategoriItemController extends Controller
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
     * @param  \App\Http\Requests\StoreKategoriItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategoriItemRequest $request)
    {
        //
        $validated = $request->validate([
            'kategori' => 'required|max:25'
        ]);

        KategoriItem::create($validated);

        return redirect('/kategori')->with('success', 'Data Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriItem  $kategori_Item
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriItem $kategori_Item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriItem  $kategori_Item
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriItem $kategori_Item)
    {
        //
        return view('TokoListrik.kategori.edit', [
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriItemRequest  $request
     * @param  \App\Models\KategoriItem  $kategori_Item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategoriItemRequest $request, KategoriItem $kategori)
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
     * @param  \App\Models\KategoriItem  $kategori_Item
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriItem $kategori)
    {
        //
        Item::destroy($kategori->id);
        return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus!');
    }
}
