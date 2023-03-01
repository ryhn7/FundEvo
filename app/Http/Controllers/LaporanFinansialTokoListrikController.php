<?php

namespace App\Http\Controllers;

use App\Models\PengeluaranOpsTokoListrik;
use Illuminate\Http\Request;
use App\Models\PenjualanItemListrik;
use Carbon\Carbon;

class LaporanFinansialTokoListrikController extends Controller
{
    public function indexPenjualanTokoListrik()
    {
        $penjualanItem = PenjualanItemListrik::sortable()->get();

        // get pendapatan where bbm_id = 1
        $pendapatanSatu = PenjualanItemListrik::where('id', 1)->sum('pendapatan');
        return view('TokoListrik.laporanFinansial.indexPenjualanItem', [
            'sells' => $penjualanItem,
            'count' => $penjualanItem->count(),
            'satu' => $pendapatanSatu,
        ]);
    }

    public function indexPengeluaranTokoListrik()
    {
        $pengeluaranOpsTokoListrik = PengeluaranOpsTokoListrik::sortable()->get();
        return view('TokoListrik.laporanFinansial.indexPengeluaranOpsTokoListrik', [
            'spends' => $pengeluaranOpsTokoListrik,
            'count' => $pengeluaranOpsTokoListrik->count(),
        ]);
    }

    // filter by month
    public function rangeFilterPenjualanItem(Request $request)
    {
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);

        $penjualanItem = PenjualanItemListrik::sortable()->whereBetween('created_at', [$start, $end])->get();

        return view('TokoListrik.laporanFinansial.indexPenjualanItem', [
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

        return view('TokoListrik.laporanFinansial.indexPenjualanItem', [
            'sells' => $penjualanItem,
            'count' => $penjualanItem->count(),
            'month' => Carbon::parse($month)->locale('id')->isoFormat('MMMM'),
        ]);
    }

    public function yearFilterPenjualanItem(Request $request)
    {
        $year = $request->year;
        $penjualanItem = PenjualanItemListrik::sortable()->whereYear('created_at', '=', $year)->get();

        return view('TokoListrik.laporanFinansial.indexPenjualanItem', [
            'sells' => $penjualanItem,
            'count' => $penjualanItem->count(),
            'year' => $year,
        ]);
    }

    public function rangeFilterPengeluaranItem(Request $request)
    {
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);

        $pengeluaranOpsTokoListrik = PengeluaranOpsTokoListrik::sortable()->whereBetween('created_at', [$start, $end])->get();

        return view('TokoListrik.laporanFinansial.indexPengeluaranOpsTokoListrik', [
            'spends' => $pengeluaranOpsTokoListrik,
            'count' => $pengeluaranOpsTokoListrik->count(),
            'start' => $start->locale('id')->isoFormat('MMMM '),
            'end' => $end->locale('id')->isoFormat('MMMM Y'),
        ]);
    }

    public function monthFilterPengeluaranItem(Request $request)
    {
        $month = $request->month;
        $pengeluaranOpsTokoListrik = PengeluaranOpsTokoListrik::sortable()->whereYear('created_at', Carbon::parse($month)->year)
            ->whereMonth('created_at', Carbon::parse($month)->month)->get();

        return view('TokoListrik.laporanFinansial.indexPengeluaranOpsTokoListrik', [
            'spends' => $pengeluaranOpsTokoListrik,
            'count' => $pengeluaranOpsTokoListrik->count(),
            'month' => Carbon::parse($month)->locale('id')->isoFormat('MMMM'),
        ]);
    }

    public function yearFilterPengeluaranItem(Request $request)
    {
        $year = $request->year;
        $pengeluaranOpsTokoListrik = PengeluaranOpsTokoListrik::sortable()->whereYear('created_at', '=', $year)->get();

        return view('TokoListrik.laporanFinansial.indexPengeluaranOpsTokoListrik', [
            'spends' => $pengeluaranOpsTokoListrik,
            'count' => $pengeluaranOpsTokoListrik->count(),
            'year' => $year,
        ]);
    }
    
}
