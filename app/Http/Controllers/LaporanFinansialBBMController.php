<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjualanBBM;
use App\Models\BBM;
use App\Models\PengeluaranOpsBBM;
use Carbon\Carbon;

class LaporanFinansialBBMController extends Controller
{
    //

    public function indexPenjualanBBM()
    {
        $bbm = BBM::all();

        //filter $penjualanBBM by month
        $penjualanBBM = PenjualanBBM::sortable()->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->get();


        $totalPendapatan = $penjualanBBM->sum('pendapatan');
        $totalLiter = $penjualanBBM->sum('penjualan');
        $totalPenyusutan = $penjualanBBM->sum('penyusutan');


        return view('SPBU.laporanFinansial.indexPenjualanBBM', [
            'sells' => $penjualanBBM,
            'count' => $penjualanBBM->count(),
            'bbms' => $bbm,
            'month' => Carbon::now()->locale('id')->isoFormat('MMMM'),
            'year' => Carbon::now()->year,
            'totalPendapatan' => $totalPendapatan,
            'totalLiter' => $totalLiter,
            'totalPenyusutan' => $totalPenyusutan,
        ]);
    }

    public function indexPengeluaranSPBU()
    {
        $pengeluaranOpsBBM = PengeluaranOpsBBM::sortable()->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->get();

        return view('SPBU.laporanFinansial.indexPengeluaranOpsBBM', [
            'spends' => $pengeluaranOpsBBM,
            'count' => $pengeluaranOpsBBM->count(),
            'month' => Carbon::now()->locale('id')->isoFormat('MMMM'),
            'year' => Carbon::now()->year,
        ]);
    }

    public function rangeFilterPenjualanBBM(Request $request)
    {
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);

        $penjualanBBM = PenjualanBBM::sortable()->whereBetween('created_at', [$start, $end])->get();

        if ($start->month == $end->month) {
            return redirect()->back()->with('error', 'Tanggal awal dan akhir tidak boleh dalam satu bulan');
        }

        return view('SPBU.laporanFinansial.indexPenjualanBBM', [
            'sells' => $penjualanBBM,
            'count' => $penjualanBBM->count(),
            'start' => $start->locale('id')->isoFormat('MMMM '),
            'end' => $end->locale('id')->isoFormat('MMMM Y'),
        ]);
    }

    public function monthFilterPenjualanBBM(Request $request)
    {
        $bbm = BBM::all();
        $month = $request->month;
        $penjualanBBM = PenjualanBBM::sortable()->whereYear('created_at', Carbon::parse($month)->year)
            ->whereMonth('created_at', Carbon::parse($month)->month)->get();

        $totalPendapatan = $penjualanBBM->sum('pendapatan');
        $totalLiter = $penjualanBBM->sum('penjualan');
        $totalPenyusutan = $penjualanBBM->sum('penyusutan');

        return view('SPBU.laporanFinansial.indexPenjualanBBM', [
            'sells' => $penjualanBBM,
            'count' => $penjualanBBM->count(),
            'month' => Carbon::parse($month)->locale('id')->isoFormat('MMMM'),
            'year' => Carbon::parse($month)->year,
            'bbms' => $bbm,
            'totalPendapatan' => $totalPendapatan,
            'totalLiter' => $totalLiter,
            'totalPenyusutan' => $totalPenyusutan,

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
            'year' => Carbon::parse($month)->year,
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
