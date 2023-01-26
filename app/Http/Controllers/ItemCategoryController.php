<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;

class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('TokoListrik.item.index', [
            'items' => Item::all()
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
        return view('TokoListrik.item.create');
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
            'kategori' => 'required|max:25',
            'nama_item' => 'required|max:25',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);

        Item::create($validated);

        return redirect('/kategori-item')->with('success', 'Data Item berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(item $kategori_item)
    {
        //
        return view('TokoListrik.item.edit', [
            'item' => $kategori_item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, item $kategori_item)
    {
        //
        $rules = [
            'kategori' => 'required|max:25',
            'nama_item' => 'required|max:25',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ];

        $validated = $request->validate($rules);

        Item::where('id', $kategori_item->id)
            ->update($validated);

        return redirect('/kategori-item')->with('success', 'Data Item berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(item $kategori_item)
    {
        //
        Item::destroy($kategori_item->id);
        return redirect('/kategori-item')->with('success', 'Data Item berhasil dihapus!');
    }
}
