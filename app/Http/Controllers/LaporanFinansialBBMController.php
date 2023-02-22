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
        $penjualanBBM = PenjualanBBM::sortable()->get();

        $labels = [];
        $values = [];
        foreach ($bbm as $item) {
            $labels[] = $item->jenis_bbm;
            $values[] = $penjualanBBM->where('bbm_id', $item->id)->sum('penjualan');
        }

        $totalPendapatan = $penjualanBBM->sum('pendapatan');
        $totalLiter = $penjualanBBM->sum('penjualan');
        $totalPenyusutan = $penjualanBBM->sum('penyusutan');

        return view('SPBU.laporanFinansial.indexPenjualanBBM', [
            'sells' => $penjualanBBM,
            'count' => $penjualanBBM->count(),
            'bbms' => $bbm,
            'totalPendapatan' => $totalPendapatan,
            'totalLiter' => $totalLiter,
            'totalPenyusutan' => $totalPenyusutan,
        ])->with('labels', json_encode($labels, JSON_NUMERIC_CHECK))
            ->with('values', json_encode($values, JSON_NUMERIC_CHECK));
    }

    public function indexPengeluaranSPBU()
    {
        $pengeluaranOpsBBM = PengeluaranOpsBBM::sortable()->get();
        return view('SPBU.laporanFinansial.indexPengeluaranOpsBBM', [
            'spends' => $pengeluaranOpsBBM,
            'count' => $pengeluaranOpsBBM->count(),
        ]);
    }

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
        $bbm = BBM::all();
        $month = $request->month;
        $penjualanBBM = PenjualanBBM::sortable()->whereYear('created_at', Carbon::parse($month)->year)
            ->whereMonth('created_at', Carbon::parse($month)->month)->get();

        $labels = [];
        $values = [];
        foreach ($bbm as $item) {
            $labels[] = $item->jenis_bbm;
            $values[] = $penjualanBBM->where('bbm_id', $item->id)->sum('penjualan');
        }

        $totalPendapatan = $penjualanBBM->sum('pendapatan');
        $totalLiter = $penjualanBBM->sum('penjualan');
        $totalPenyusutan = $penjualanBBM->sum('penyusutan');

        return view('SPBU.laporanFinansial.indexPenjualanBBM', [
            'sells' => $penjualanBBM,
            'count' => $penjualanBBM->count(),
            'month' => Carbon::parse($month)->locale('id')->isoFormat('MMMM'),
            'bbms' => $bbm,
            'totalPendapatan' => $totalPendapatan,
            'totalLiter' => $totalLiter,
            'totalPenyusutan' => $totalPenyusutan,

        ])->with('labels', json_encode($labels, JSON_NUMERIC_CHECK))
            ->with('values', json_encode($values, JSON_NUMERIC_CHECK));
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
