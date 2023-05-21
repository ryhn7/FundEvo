<?php

namespace App\Http\Controllers;

use App\Models\OliGas;
use App\Models\OliGasStatic;
use Illuminate\Http\Request;

class OliGasCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('SPBU.categoryOliGas.index', [
            'oligases' => OliGas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SPBU.categoryOliGas.create', [
            'oligases' => OliGasStatic::all()
        ]);
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
            'oli_gas_static_id' => 'required',
            'nama' => 'required|max:25',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);

        OliGas::create($validated);

        return redirect('/KategoriOliGas')->with('success', 'Data Oli/Gas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OliGas  $KategoriOliGa
     * @return \Illuminate\Http\Response
     */
    public function show(OliGas $KategoriOliGa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OliGas  $KategoriOliGa
     * @return \Illuminate\Http\Response
     */
    public function edit(OliGas $KategoriOliGa)
    {
        return view('SPBU.categoryOliGas.edit', [
            'oligas' => $KategoriOliGa,
            'oligases' => OliGasStatic::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OliGas  $KategoriOliGa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OliGas $KategoriOliGa)
    {
        $rules = [
            'oli_gas_static_id' => 'required',
            'nama' => 'required|max:25',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ];

        $validated = $request->validate($rules);

        OliGas::where('id', $KategoriOliGa->id)
            ->update($validated);

        return redirect('/KategoriOliGas')->with('success', 'Data Oli/Gas berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OliGas  $KategoriOliGa
     * @return \Illuminate\Http\Response
     */
    public function destroy(OliGas $KategoriOliGa)
    {
        OliGas::destroy($KategoriOliGa->id);
        return redirect('/KategoriOliGas')->with('success', 'Data Oli/Gas berhasil dihapus!');
    }
}
