<?php

namespace App\Http\Controllers;

use App\Models\PenjualanBBM;
use Illuminate\Http\Request;

class PenjualanBBMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $penjualanBBM = PenjualanBBM::all();
        $start = $penjualanBBM->sum('pendapatan');
        $uang = 'Rp. '. number_format($start,0,',','.');
        return $uang;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenjualanBBM  $penjualanBBM
     * @return \Illuminate\Http\Response
     */
    public function show(PenjualanBBM $penjualanBBM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenjualanBBM  $penjualanBBM
     * @return \Illuminate\Http\Response
     */
    public function edit(PenjualanBBM $penjualanBBM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenjualanBBM  $penjualanBBM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenjualanBBM $penjualanBBM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenjualanBBM  $penjualanBBM
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenjualanBBM $penjualanBBM)
    {
        //
    }
}
