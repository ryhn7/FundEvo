<?php

namespace App\Http\Controllers;

use App\Models\PenjualanItemListrik;
use Illuminate\Http\Request;
use App\Models\Item;
use Carbon\Carbon;

class PenjualanItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $date = Carbon::today()->toDateString();
        // return($date);
        $penjualanItem = PenjualanItemListrik::where('date', Carbon::today()->toDateString())->get();
        return view('TokoListrik.penjualanItem.index', [
            'sells' => $penjualanItem,
            'totalAmount' => $penjualanItem->sum('pendapatan'),
            'totalSell' => $penjualanItem->sum('penjualan'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TokoListrik.penjualanItem.create', [
            'items' => Item::all(),
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
            'item_id' => 'required',
            'stock_awal' => 'required|numeric',
            'penerimaan' => 'nullable|numeric',
            'penjualan' => 'nullable|numeric',
            'stock_akhir' => 'required|numeric',
            'pendapatan' => 'required|numeric',
        ]);

        PenjualanItemListrik::create($validated);

        return redirect('/penjualan-item')->with('success', 'Data penjualan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenjualanItemListrik  $penjualanItemListrik
     * @return \Illuminate\Http\Response
     */
    public function show(PenjualanItemListrik $penjualanItemListrik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenjualanItemListrik  $penjualanItemListrik
     * @return \Illuminate\Http\Response
     */
    public function edit(PenjualanItemListrik $penjualan_item)
    {
        return view('TokoListrik.penjualanItem.edit', [
            'items' => Item::all(),
            'sell' => $penjualan_item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenjualanItemListrik  $penjualanItemListrik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenjualanItemListrik $penjualan_item)
    {
        $rules = [
            'item_id' => 'required',
            'stock_awal' => 'required|numeric',
            'penerimaan' => 'nullable|numeric',
            'penjualan' => 'nullable|numeric',
            'stock_akhir' => 'required|numeric',
            'pendapatan' => 'required|numeric',
        ];

        $validated = $request->validate($rules);

        PenjualanItemListrik::where('id', $penjualan_item->id)
            ->update($validated);

        return redirect('/penjualan-item')->with('success', 'Data penjualan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenjualanItemListrik  $penjualanItemListrik
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenjualanItemListrik $penjualan_item)
    {
        PenjualanItemListrik::destroy($penjualan_item->id);

        return redirect('/penjualan-item')->with('success', 'Data penjualan berhasil dihapus!');
    }
}
