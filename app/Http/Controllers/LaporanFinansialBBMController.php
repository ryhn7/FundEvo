<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjualanBBM;
use Carbon\Carbon;



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
}
