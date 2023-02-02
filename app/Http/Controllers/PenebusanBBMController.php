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
        return view('SPBU.penebusanBBM.index', [
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
            'total_tebusan' => 'required|numeric',
        ]);

        PenebusanBBM::create($validated);

        return redirect('/penebusan-bbm')->with('success', 'Data penebusan bbm berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenebusanBBM  $penebusan_bbm
     * @return \Illuminate\Http\Response
     */
    public function show(PenebusanBBM $penebusan_bbm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenebusanBBM  $penebusan_bbm
     * @return \Illuminate\Http\Response
     */
    public function edit(PenebusanBBM $penebusan_bbm)
    {
        return view('SPBU.penebusanBBM.edit', [
            'redeem' => $penebusan_bbm,
            'bbms' => BBM::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenebusanBBM  $penebusan_bbm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenebusanBBM $penebusan_bbm)
    {
        $rules = [
            'bbm_id' => 'required',
            'tebusan_per_liter' => 'required|numeric',
            'harga_tebusan' => 'required|numeric',
            'pph' => 'required|numeric',
            'tips_sopir' => 'required|numeric',
            'total_tebusan' => 'required|numeric',
        ];

        $validated = $request->validate($rules);

        PenebusanBBM::where('id', $penebusan_bbm->id)
            ->update($validated);

        return redirect('/penebusan-bbm')->with('success', 'Data penebusan bbm berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenebusanBBM  $penebusan_bbm
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenebusanBBM $penebusan_bbm)
    {
        PenebusanBBM::destroy($penebusan_bbm->id);

        return redirect('/penebusan-bbm')->with('success', 'Data penebusan bbm berhasil dihapus!');
    }
}
