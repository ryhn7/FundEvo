<?php

namespace App\Http\Controllers;

use App\Models\PenebusanBBM;
use App\Models\BBM;
use Illuminate\Http\Request;

class PenebusanBBMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('SPBU.penebusanBBM.index',[
            'redeems' => PenebusanBBM::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SPBU.penebusanBBM.create', [
            'bbms' => BBM::all(),
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
            'bbm_id' => 'required',
            'tebusan_per_liter' => 'required|numeric',
            'harga_tebusan' => 'required|numeric',
            'pph' => 'required|numeric',
            'tips_sopir' => 'required|numeric',
        ]);

        PenebusanBBM::create($validated);

        return redirect('/penebusan-bbm')->with('success', 'Data penebusan bbm berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenebusanBBM  $penebusanBBM
     * @return \Illuminate\Http\Response
     */
    public function show(PenebusanBBM $penebusanBBM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenebusanBBM  $penebusanBBM
     * @return \Illuminate\Http\Response
     */
    public function edit(PenebusanBBM $penebusanBBM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenebusanBBM  $penebusanBBM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenebusanBBM $penebusanBBM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenebusanBBM  $penebusanBBM
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenebusanBBM $penebusanBBM)
    {
        //
    }
}
