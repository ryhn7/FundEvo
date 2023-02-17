<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjualanBBM;


class LaporanFinansialBBMController extends Controller
{
    //

    public function index()
    {

        $penjualanBBM = PenjualanBBM::all();
        return view('SPBU.laporanFinansial.index', [
            'sells' => $penjualanBBM,
        ]);
    }
}
