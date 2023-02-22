<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjualanBBM;
use App\Models\PengeluaranOpsBBM;
use Carbon\Carbon;

class LaporanFinansialBBMController extends Controller
{
    //

    public function indexPenjualanBBM()
    {
        $penjualanBBM = PenjualanBBM::sortable()->get();

        // get pendapatan where bbm_id = 1
        $pendapatanSatu = PenjualanBBM::where('bbm_id', 1)->sum('pendapatan');
        return view('SPBU.laporanFinansial.indexPenjualanBBM', [
            'sells' => $penjualanBBM,
            'count' => $penjualanBBM->count(),
            'satu' => $pendapatanSatu,
        ]);
    }

    public function indexPengeluaranSPBU()
    {
        $pengeluaranOpsBBM = PengeluaranOpsBBM::sortable()->get();
        return view('SPBU.laporanFinansial.indexPengeluaranOpsBBM', [
            'spends' => $pengeluaranOpsBBM,
            'count' => $pengeluaranOpsBBM->count(),
        ]);
    }

    // filter by month
    public function rangeFilterPenjualanBBM(Request $request)
    {
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);

        $penjualanBBM = PenjualanBBM::sortable()->whereBetween('created_at', [$start, $end])->get();

        return view('SPBU.laporanFinansial.indexPenjualanBBM', [
            'sells' => $penjualanBBM,
            'count' => $penjualanBBM->count(),
            'start' => $start->locale('id')->isoFormat('MMMM '),
            'end' => $end->locale('id')->isoFormat('MMMM Y'),
        ]);
    }

    public function monthFilterPenjualanBBM(Request $request)
    {
        $month = $request->month;
        $penjualanBBM = PenjualanBBM::sortable()->whereYear('created_at', Carbon::parse($month)->year)
            ->whereMonth('created_at', Carbon::parse($month)->month)->get();

        return view('SPBU.laporanFinansial.indexPenjualanBBM', [
            'sells' => $penjualanBBM,
            'count' => $penjualanBBM->count(),
            'month' => Carbon::parse($month)->locale('id')->isoFormat('MMMM'),
        ]);
    }

    public function yearFilterPenjualanBBM(Request $request)
    {
        $year = $request->year;
        $penjualanBBM = PenjualanBBM::sortable()->whereYear('created_at', '=', $year)->get();

        return view('SPBU.laporanFinansial.indexPenjualanBBM', [
            'sells' => $penjualanBBM,
            'count' => $penjualanBBM->count(),
            'year' => $year,
        ]);
    }

    public function rangeFilterPengeluaranSPBU(Request $request)
    {
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);

        $pengeluaranOpsBBM = PengeluaranOpsBBM::sortable()->whereBetween('created_at', [$start, $end])->get();

        return view('SPBU.laporanFinansial.indexPengeluaranOpsBBM', [
            'spends' => $pengeluaranOpsBBM,
            'count' => $pengeluaranOpsBBM->count(),
            'start' => $start->locale('id')->isoFormat('MMMM '),
            'end' => $end->locale('id')->isoFormat('MMMM Y'),
        ]);
    }

    public function monthFilterPengeluaranSPBU(Request $request)
    {
        $month = $request->month;
        $pengeluaranOpsBBM = PengeluaranOpsBBM::sortable()->whereYear('created_at', Carbon::parse($month)->year)
            ->whereMonth('created_at', Carbon::parse($month)->month)->get();

        return view('SPBU.laporanFinansial.indexPengeluaranOpsBBM', [
            'spends' => $pengeluaranOpsBBM,
            'count' => $pengeluaranOpsBBM->count(),
            'month' => Carbon::parse($month)->locale('id')->isoFormat('MMMM'),
        ]);
    }

    public function yearFilterPengeluaranSPBU(Request $request)
    {
        $year = $request->year;
        $pengeluaranOpsBBM = PengeluaranOpsBBM::sortable()->whereYear('created_at', '=', $year)->get();

        return view('SPBU.laporanFinansial.indexPengeluaranOpsBBM', [
            'spends' => $pengeluaranOpsBBM,
            'count' => $pengeluaranOpsBBM->count(),
            'year' => $year,
        ]);
    }
}