<?php

namespace App\Http\Controllers;

use App\Models\PenjualanItemListrik;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\KategoriItem;
use Carbon\Carbon;
use Symfony\Contracts\Service\Attribute\Required;

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
        $penjualanItem = PenjualanItemListrik::whereDate('created_at', Carbon::today()->toDateString())->get();
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
            'kategoris' => KategoriItem::all()
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
        // dd(request()->all());
        $validated = $request->validate([
            'item_id' => 'nullable',
            'kategori_id' => 'required',
            'stock_awal' => 'required|numeric',
            'penerimaan' => 'nullable|numeric',
            'penyusutan' => 'nullable|numeric',
            'penjualan' => 'nullable|numeric',
            'stock_akhir' => 'required|numeric',
            'pendapatan' => 'required|numeric',
            'created_at' => 'nullable|date',
        ]);

        if ($validated['created_at'] == null) {
            $validated['created_at'] = Carbon::now();
        }

        //limit item from item_id to 1 each
        $item_id = $request->item_id;
        $date = $request->created_at;

        $yesterday = Carbon::yesterday()->toDateString();
        $dayBeforeYesterday = Carbon::yesterday()->subDay()->toDateString();
        $penjualanItemDayBeforeYesterday = PenjualanItemListrik::where('item_id', $item_id)->whereDate('created_at', $dayBeforeYesterday)->first();
        $penjualanItemYesterday = PenjualanItemListrik::where('item_id', $item_id)->whereDate('created_at', $yesterday)->first();
        $penjualanItem = PenjualanItemListrik::where('item_id', $item_id)->whereDate('created_at', Carbon::now()->toDateString())->first();
        $allItem = PenjualanItemListrik::where('item_id', $item_id)->get();

        if ($penjualanItem) {
            return redirect('/penjualan-item')->with('error', 'Hanya boleh input 1 jenis Item per hari!');
        }

        
        if ($allItem->count() == 0) {
            PenjualanItemListrik::create($validated);
            return redirect('/penjualan-item')->with('success', 'Data penjualan berhasil ditambahkan!');
        } else if (!$penjualanItemYesterday) {
            if ($penjualanItemDayBeforeYesterday && $date != Carbon::now()->toDateString()) {
                PenjualanItemListrik::create($validated);
                return redirect('/penjualan-item')->with('success', 'Data penjualan berhasil ditambahkan!');
            } else {
                return redirect('/penjualan-item')->with('error', 'Harap input penjualan Item hari kemarin terlebih dahulu!');
            }
        } else {
            PenjualanItemListrik::create($validated);
            return redirect('/penjualan-item')->with('success', 'Data penjualan berhasil ditambahkan!');
        }

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
            'kategoris' => KategoriItem::all(),
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
            'item_id' => 'nullable',
            'stock_awal' => 'required|numeric',
            'penerimaan' => 'nullable|numeric',
            'penjualan' => 'nullable|numeric',
            'stock_akhir' => 'required|numeric',
            'penyusutan' => 'required|numeric',
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

    public function getItem($id)
    {
        $item = Item::where('kategori', $id)->get();
        return response()->json($item);
    }

    public function getHarga($id)
    {
        // $harga = Item::find($id);
        $harga = Item::where('id', $id)->get('harga_jual');
        return response()->json($harga);
    }

    public function getPreviousStock($id)
    {
        $penjualanItem = PenjualanItemListrik::where('item_id', $id)->latest()->first();
        return response()->json($penjualanItem);
    }
    
    public function filter(Request $request)
    {
        // dd($request->date);
        $date = Carbon::parse($request->date)->toDateString();
        // return $date;
        $penjualanItem = PenjualanItemListrik::whereDate('created_at', '=', $date)->get();
        return view('TokoListrik.penjualanItem.index', [
            'sells' => $penjualanItem,
            'totalAmount' => $penjualanItem->sum('pendapatan'),
            'totalSell' => $penjualanItem->sum('penjualan'),
        ]);
    }

    public function checkYesterday($id)
    {
        $allItem = PenjualanItemListrik::where('item_id', $id)->get();
        $yesterday = Carbon::yesterday()->toDateString();
        $penjualanItemYesterday = PenjualanItemListrik::where('bbm_id', $id)->whereDate('created_at', $yesterday)->first();

        if ($allItem->count() == 0) {
            return response()->json(true);
        } else {
            if ($penjualanItemYesterday == null) {
                return response()->json(false);
            } else {
                return response()->json($penjualanItemYesterday);
            }
        }
    }
}