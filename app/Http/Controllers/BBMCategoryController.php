<?php

namespace App\Http\Controllers;

use App\Models\BBM;
use Illuminate\Http\Request;

class BBMCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('SPBU.categoryBBM.index', [
            'bbms' => BBM::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SPBU.categoryBBM.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_bbm' => 'required|max:25',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);

        BBM::create($validated);

        return redirect('/kategori-bbm')->with('success', 'Data BBM berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BBM  $bBM
     * @return \Illuminate\Http\Response
     */
    public function show(BBM $bBM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BBM  $bBM
     * @return \Illuminate\Http\Response
     */
    public function edit(BBM $kategori_bbm)
    {
        // return $kategori_bbm;
        return view('SPBU.categoryBBM.edit', [
            'bbm' => $kategori_bbm
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BBM  $bBM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BBM $kategori_bbm)
    {
        $rules = [
            'jenis_bbm' => 'required|max:25',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ];

        $validated = $request->validate($rules);

        BBM::where('id', $kategori_bbm->id)
            ->update($validated);

        return redirect('/kategori-bbm')->with('success', 'Data BBM berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BBM  $bBM
     * @return \Illuminate\Http\Response
     */
    public function destroy(BBM $kategori_bbm)
    {
        BBM::destroy($kategori_bbm->id);
        return redirect('/kategori-bbm')->with('success', 'Data BBM berhasil dihapus!');
    }
}
