<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjualanItemListrik;
use Carbon\Carbon;

class LaporanFinansialTokoListrikController extends Controller
{
    public function index()
    {
        $penjualanItem = PenjualanItemListrik::sortable()->get();
        return view('TokoListrik.laporanFinansial.index', [
            'sells' => $penjualanItem,
            'count' => $penjualanItem->count(),
        ]);
    }

    // filter by month
    public function rangeFilterPenjualanItem(Request $request)
    {
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);
        
        $penjualanItem = PenjualanItemListrik::sortable()->whereBetween('created_at', [$start, $end])->get();

        return view('TokoListrik.laporanFinansial.index', [
            'sells' => $penjualanItem,
            'count' => $penjualanItem->count(),
            'start' => $start->locale('id')->isoFormat('MMMM '),
            'end' => $end->locale('id')->isoFormat('MMMM Y'),
        ]);
    }

    public function monthFilterPenjualanItem(Request $request)
    {
        $month = $request->month;
        $penjualanItem = PenjualanItemListrik::sortable()->whereYear('created_at', Carbon::parse($month)->year)
            ->whereMonth('created_at', Carbon::parse($month)->month)->get();

        return view('TokoListrik.laporanFinansial.index', [
            'sells' => $penjualanItem,
            'count' => $penjualanItem->count(),
            'month' => Carbon::parse($month)->locale('id')->isoFormat('MMMM'),
        ]);
    }

    public function yearFilterPenjualanItem(Request $request)
    {
        $year = $request->year;
        $penjualanItem = PenjualanItemListrik::sortable()->whereYear('created_at', '=', $year)->get();

        return view('TokoListrik.laporanFinansial.index', [
            'sells' => $penjualanItem,
            'count' => $penjualanItem->count(),
            'year' => $year,
        ]);
    }
    
}
