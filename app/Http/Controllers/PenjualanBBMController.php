<?php

namespace App\Http\Controllers;

use App\Models\PenjualanBBM;
use App\Models\BBM;
use Carbon\Carbon;
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
        // $date = Carbon::now()->toDateString();
        // return($date);

        $penjualanBBM = PenjualanBBM::whereDate('created_at', Carbon::now()->toDateString())->get();
        return view('SPBU.penjualanBBM.index', [
            'sells' => $penjualanBBM,
            'totalAmount' => $penjualanBBM->sum('pendapatan'),
            'totalSell' => $penjualanBBM->sum('penjualan'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SPBU.penjualanBBM.create', [
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
            'stock_awal' => 'required|numeric',
            'penerimaan' => 'nullable|numeric',
            'tera_densiti' => 'nullable|numeric',
            'penjualan' => 'required|numeric',
            'stock_adm' => 'required|numeric',
            'stock_fakta' => 'required|numeric',
            'penyusutan' => 'required|numeric',
            'pendapatan' => 'required|numeric',
            'created_at' => 'nullable|date',
        ]);

        if ($validated['created_at'] == null) {
            $validated['created_at'] = Carbon::now();
        }

        $bbm_id = $request->bbm_id;
        $date = $request->created_at;

        $yesterday = Carbon::yesterday()->toDateString();
        $dayBeforeYesterday = Carbon::yesterday()->subDay()->toDateString();
        $penjualanBBMDayBeforeYesterday = PenjualanBBM::where('bbm_id', $bbm_id)->whereDate('created_at', $dayBeforeYesterday)->first();
        $penjualanBBMYesterday = PenjualanBBM::where('bbm_id', $bbm_id)->whereDate('created_at', $yesterday)->first();
        $penjualanBBM = PenjualanBBM::where('bbm_id', $bbm_id)->whereDate('created_at', Carbon::now()->toDateString())->first();
        $allBBM = PenjualanBBM::all();

        if ($penjualanBBM) {
            return redirect('/PenjualanBBM')->with('error', 'Hanya boleh input 1 jenis BBM per hari!');
        }

        if ($allBBM->count() == 0) {
            PenjualanBBM::create($validated);
            return redirect('/PenjualanBBM')->with('success', 'Data penjualan berhasil ditambahkan!');
        } else if (!$penjualanBBMYesterday) {
            if ($penjualanBBMDayBeforeYesterday && $date != Carbon::now()->toDateString()) {
                PenjualanBBM::create($validated);
                return redirect('/PenjualanBBM')->with('success', 'Data penjualan berhasil ditambahkan!');
            } else {
                return redirect('/PenjualanBBM')->with('error', 'Harap input penjualan BBM hari kemarin terlebih dahulu!');
            }
        } else {
            PenjualanBBM::create($validated);
            return redirect('/PenjualanBBM')->with('success', 'Data penjualan berhasil ditambahkan!');
        }

        PenjualanBBM::create($validated);
        return redirect('/PenjualanBBM')->with('success', 'Data penjualan berhasil ditambahkan!');
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
    public function edit(PenjualanBBM $PenjualanBBM)
    {
        return view('SPBU.penjualanBBM.edit', [
            'bbms' => BBM::all(),
            'sell' => $PenjualanBBM,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenjualanBBM  $penjualanBBM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenjualanBBM $PenjualanBBM)
    {
        $rules = [
            'bbm_id' => 'required',
            'stock_awal' => 'required|numeric',
            'penerimaan' => 'nullable|numeric',
            'tera_densiti' => 'nullable|numeric',
            'penjualan' => 'required|numeric',
            'stock_adm' => 'required|numeric',
            'stock_fakta' => 'required|numeric',
            'penyusutan' => 'required|numeric',
            'pendapatan' => 'required|numeric',
            'created_at' => 'nullable|date',
        ];

        $validated = $request->validate($rules);

        if ($validated['created_at'] == null) {
            $validated['created_at'] = Carbon::now();
        }

        PenjualanBBM::where('id', $PenjualanBBM->id)
            ->update($validated);

        return redirect('/PenjualanBBM')->with('success', 'Data penjualan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenjualanBBM  $penjualanBBM
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenjualanBBM $PenjualanBBM)
    {
        PenjualanBBM::destroy($PenjualanBBM->id);

        return redirect('/PenjualanBBM')->with('success', 'Data penjualan berhasil dihapus!');
    }

    // create filter for date
    public function filter(Request $request)
    {
        // dd($request->date);
        $date = Carbon::parse($request->date)->toDateString();
        // return $date;
        $penjualanBBM = PenjualanBBM::whereDate('created_at', '=', $date)->get();
        return view('SPBU.penjualanBBM.index', [
            'sells' => $penjualanBBM,
            'totalAmount' => $penjualanBBM->sum('pendapatan'),
            'totalSell' => $penjualanBBM->sum('penjualan'),
        ]);
    }

    public function getHarga($id)
    {
        $bbm = BBM::find($id);
        return response()->json($bbm);
    }

    public function getPreviousStock($id)
    {
        $penjualanBBM = PenjualanBBM::where('bbm_id', $id)->latest()->first();
        return response()->json($penjualanBBM);
    }

    public function checkYesterday($id)
    {
        $allBBM = PenjualanBBM::all();
        $yesterday = Carbon::yesterday()->toDateString();
        $penjualanBBMYesterday = PenjualanBBM::where('bbm_id', $id)->whereDate('created_at', $yesterday)->first();

        if ($allBBM->count() == 0) {
            return response()->json(true);
        } else {
            if ($penjualanBBMYesterday == null) {
                return response()->json(false);
            } else {
                return response()->json($penjualanBBMYesterday);
            }
        }
    }
}
