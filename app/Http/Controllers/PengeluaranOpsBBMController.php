<?php

namespace App\Http\Controllers;

use App\Models\PengeluaranOpsBBM;
use App\Models\BBM;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengeluaranOpsBBMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spend = PengeluaranOpsBBM::where('date', Carbon::today()->toDateString())->get();
        $totalGas = $spend->sum('gas');
        $totalOli = $spend->sum('oli');
        $totalGajiSupervisor = $spend->sum('gaji_supervisor');
        $totalGajiKaryawan = $spend->sum('gaji_karyawan');
        $totalReward = $spend->sum('reward_karyawan');
        $pln = $spend->sum('pln');
        $pdam = $spend->sum('pdam');
        $iuranRt  = $spend->sum('iuran_rt');
        $pbb = $spend->sum('pbb');
        $etc = $spend->sum('biaya_lain');
        $result = (int)$totalGas + (int)$totalOli + (int)$totalGajiSupervisor + (int)$totalGajiKaryawan + (int)$totalReward + (int)$pln + (int)$pdam + (int)$iuranRt + (int)$pbb + (int)$etc;
        return view('SPBU.pengeluaranOpsBBM.index', [
            'spends' => $spend,
            'result' => $result,
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
        // $validated = $request->validate([
        //     'bbm_id' => 'nullable|numeric',
        //     'harga_penebusan_bbm' => 'nullable|numeric',
        //     'pph' => 'nullable|numeric',
        //     'tips_sopir' => 'nullable|numeric',
        //     'oli' => 'nullable|numeric',
        //     'gas' => 'nullable|numeric',
        //     'gaji_supervisor' => 'nullable|numeric',
        //     'gaji_karyawan' => 'nullable|numeric',
        //     'reward_karyawan' => 'nullable|numeric',
        //     'pln' => 'nullable|numeric',
        //     'pdam' => 'nullable|numeric',
        //     'iuran_rt' => 'nullable|numeric',
        //     'pbb' => 'nullable|numeric',
        //     'biaya_lain' => 'nullable|numeric',
        //     'keterangan' => 'nullable|text',
        //     'nota' => 'nullable|text',
        // ]);

        // PengeluaranOpsBBM::create($validated);

        // return redirect('/pengeluaran-ops-bbm')->with('success', 'Data pengeluaran berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengeluaranOpsBBM  $pengeluaran_ops_bbm
     * @return \Illuminate\Http\Response
     */
    public function show(PengeluaranOpsBBM $pengeluaran_ops_bbm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengeluaranOpsBBM  $pengeluaran_ops_bbm
     * @return \Illuminate\Http\Response
     */
    public function edit(PengeluaranOpsBBM $pengeluaran_ops_bbm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengeluaranOpsBBM  $pengeluaran_ops_bbm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengeluaranOpsBBM $pengeluaran_ops_bbm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengeluaranOpsBBM  $pengeluaran_ops_bbm
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengeluaranOpsBBM $pengeluaran_ops_bbm)
    {
        //
    }
}
