<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjualanBBM;
use Carbon\Carbon;
use Termwind\Components\Dd;

class LaporanFinansialBBMController extends Controller
{
    //

    public function index()
    {
        // $start = Carbon::now()->startOfMonth();
        // $end = Carbon::now()->endOfMonth();

        // return $start->format('Y-m-d') . ' - ' . $end->format('Y-m-d');

        // get penjualanBBM from date one until end of month
        // $penjualanBBM = PenjualanBBM::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();
        $penjualanBBM = PenjualanBBM::sortable()->get();
        return view('SPBU.laporanFinansial.index', [
            'sells' => $penjualanBBM,
            'count' => $penjualanBBM->count(),
        ]);
    }

    // filter by month
    // public function filter(Request $request)
    // {
    //     $start = Carbon::parse($request->start)->startOfMonth();
    //     $end = Carbon::parse($request->end)->endOfMonth();

    //     $penjualanBBM = PenjualanBBM::whereBetween('created_at', [$start, $end])->get();

    //     return view('SPBU.laporanFinansial.index', [
    //         'sells' => $penjualanBBM,
    //         'count' => $penjualanBBM->count(),
    //     ]);
    // }

    public function monthFilterPenjualanBBM(Request $request)
    {
        $month = $request->month;
        $penjualanBBM = PenjualanBBM::sortable()->whereYear('created_at', Carbon::parse($month)->year)
            ->whereMonth('created_at', Carbon::parse($month)->month)->get();
            
        return view('SPBU.laporanFinansial.index', [
            'sells' => $penjualanBBM,
            'count' => $penjualanBBM->count(),
        ]);
    }

    public function yearFilterPenjualanBBM(Request $request)
    {
        $year = $request->year;
        $penjualanBBM = PenjualanBBM::sortable()->whereYear('created_at', '=', $year)->get();

        return view('SPBU.laporanFinansial.index', [
            'sells' => $penjualanBBM,
            'count' => $penjualanBBM->count(),
        ]);
    }
}
