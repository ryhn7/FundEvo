<?php

namespace App\Http\Controllers;

use App\Models\PenjualanOliGas;
use App\Models\OliGas;
use App\Models\OliGasStatic;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenjualanOliGasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PenjualanOliGas = PenjualanOliGas::whereDate('created_at', Carbon::now()->toDateString())->get();
        return view('SPBU.penjualanOliGas.index', [
            'sells' => $PenjualanOliGas,
            'totalAmount' => $PenjualanOliGas->sum('pendapatan'),
            'totalSell' => $PenjualanOliGas->sum('penjualan'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SPBU.penjualanOliGas.create', [
            'oligases' => OliGasStatic::all(),
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
            'oli_gas_id' => 'required',
            'nama' => 'required|string',
            'stock_awal' => 'required|numeric',
            'penerimaan' => 'nullable|numeric',
            'penjualan' => 'required|numeric',
            'stock_akhir' => 'required|numeric',
            'pendapatan' => 'required|numeric',
            'created_at' => 'nullable|date',
        ]);

        if ($validated['created_at'] == null) {
            $validated['created_at'] = Carbon::now();
        }

        $nama = $request->nama;
        $date = $request->created_at;

        $yesterday = Carbon::yesterday()->toDateString();
        $dayBeforeYesterday = Carbon::yesterday()->subDay()->toDateString();
        $PenjualanOliGasDayBeforeYesterday = PenjualanOliGas::where('nama', $nama)->whereDate('created_at', $dayBeforeYesterday)->first();
        $PenjualanOliGasYesterday = PenjualanOliGas::where('nama', $nama)->whereDate('created_at', $yesterday)->first();
        $PenjualanOliGas = PenjualanOliGas::where('nama', $nama)->whereDate('created_at', Carbon::now()->toDateString())->first();
        $allOliGas = PenjualanOliGas::where('nama', $nama)->get();


        if ($PenjualanOliGas) {
            return redirect('/PenjualanOliGas')->with('error', 'Data sudah ada!');
        }

        if ($allOliGas->count() == 0) {
            PenjualanOliGas::create($validated);
            return redirect('/PenjualanOliGas')->with('success', 'Data berhasil ditambahkan!');
        } else if (!$PenjualanOliGasYesterday) {
            if ($PenjualanOliGasDayBeforeYesterday && $date != Carbon::now()->toDateString()) {
                PenjualanOliGas::create($validated);
                return redirect('/PenjualanOliGas')->with('success', 'Data penjualan berhasil ditambahkan!');
            } else {
                return redirect('/PenjualanOliGas')->with('error', 'Harap input data penjualan hari kemarin terlebih dahulu!');
            }
        }

        // dd($validated);
        PenjualanOliGas::create($validated);
        return redirect('/PenjualanOliGas')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenjualanOliGas  $PenjualanOliGa
     * @return \Illuminate\Http\Response
     */
    public function show(PenjualanOliGas $PenjualanOliGa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenjualanOliGas  $PenjualanOliGa
     * @return \Illuminate\Http\Response
     */
    public function edit(PenjualanOliGas $PenjualanOliGa)
    {
        return view('SPBU.penjualanOliGas.edit', [
            'oligases' => OliGasStatic::all(),
            'sell' => $PenjualanOliGa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenjualanOliGas  $PenjualanOliGa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenjualanOliGas $PenjualanOliGa)
    {
        $rules = [
            'oli_gas_id' => 'required',
            'nama' => 'required|string',
            'stock_awal' => 'required|numeric',
            'penerimaan' => 'nullable|numeric',
            'penjualan' => 'required|numeric',
            'stock_akhir' => 'required|numeric',
            'pendapatan' => 'required|numeric',
            'created_at' => 'nullable|date',
        ];

        $validated = $request->validate($rules);

        if ($validated['created_at'] == null) {
            $validated['created_at'] = Carbon::now();
        }

        $nama = $request->nama;
        $PenjualanOliGas = PenjualanOliGas::where('nama', $nama)->whereDate('created_at', Carbon::now()->toDateString())->first();


        if ($PenjualanOliGas) {
            return redirect('/PenjualanOliGas')->with('error', 'Data sudah ada!');
        }

        PenjualanOliGas::where('id', $PenjualanOliGa->id)
            ->update($validated);

        return redirect('/PenjualanOliGas')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenjualanOliGas  $PenjualanOliGa
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenjualanOliGas $PenjualanOliGa)
    {
        PenjualanOliGas::destroy($PenjualanOliGa->id);

        return redirect('/PenjualanOliGas')->with('success', 'Data berhasil dihapus!');
    }

    public function filter(Request $request)
    {
        $date = Carbon::parse($request->date)->toDateString();
        $PenjualanOliGas = PenjualanOliGas::whereDate('created_at', '=', $date)->get();
        return view('SPBU.penjualanOliGas.index', [
            'sells' => $PenjualanOliGas,
            'totalAmount' => $PenjualanOliGas->sum('pendapatan'),
            'totalSell' => $PenjualanOliGas->sum('penjualan'),
        ]);
    }

    public function getData($id)
    {
        $oligas = OliGas::where('oli_gas_static_id', $id)->get();
        return response()->json($oligas);
    }

    public function getHarga($id)
    {
        $oligas = OliGas::where('nama', $id)->get();
        return response()->json($oligas);
    }

    public function getPreviousStock($id)
    {
        $penjualanOliGas = PenjualanOliGas::where('nama', $id)->latest()->first();
        return response()->json($penjualanOliGas);
    }

    public function checkYesterday($id)
    {
        $oliGas = PenjualanOliGas::where('nama', $id)->get();
        $yesterday = Carbon::yesterday()->toDateString();
        $PenjualanOliGasYesterday = PenjualanOliGas::where('nama', $id)->whereDate('created_at', $yesterday)->first();

        if ($oliGas->count() == 0) {
            return response()->json(true);
        } else {
            if ($PenjualanOliGasYesterday == null) {
                return response()->json(false);
            } else {
                return response()->json($PenjualanOliGasYesterday);
            }
        }
    }
}
