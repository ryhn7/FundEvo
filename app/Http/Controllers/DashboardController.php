<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjualanBBM;
use App\Models\BBM;
use Carbon\Carbon;
use App\Models\PengeluaranOpsBBM;

class DashboardController extends Controller
{
    //
    public function indexDashboardBBM()
    {

        $bbm = BBM::all();
        $penjualanBBM = PenjualanBBM::all();

        $totalPendapatan = $penjualanBBM->sum('pendapatan');

        $pengeluaranOpsBBM = PengeluaranOpsBBM::all();

        $tebusan = $pengeluaranOpsBBM->sum('harga_penebusan_bbm');
        $totalGajiSupervisor = $pengeluaranOpsBBM->sum('gaji_supervisor');
        $totalGajiKaryawan = $pengeluaranOpsBBM->sum('gaji_karyawan');
        $totalReward = $pengeluaranOpsBBM->sum('reward_karyawan');
        $tipsSopir = $pengeluaranOpsBBM->sum('tips_sopir');
        $pln = $pengeluaranOpsBBM->sum('pln');
        $pdam = $pengeluaranOpsBBM->sum('pdam');
        $pph = $pengeluaranOpsBBM->sum('pph');
        $iuranRt  = $pengeluaranOpsBBM->sum('iuran_rt');
        $pbb = $pengeluaranOpsBBM->sum('pbb');
        $etc = $pengeluaranOpsBBM->sum('biaya_lain');

        $totalTebusan = $tebusan + $pph;

        $hpp = [];
        foreach ($bbm as $item) {
            $hargaBeli = $item->harga_beli;
            $penjualan = $penjualanBBM->where('bbm_id', $item->id)->sum('penjualan');
            $penyusutan = $penjualanBBM->where('bbm_id', $item->id)->sum('penyusutan');

            // if penyusutan < 0, then make it positive
            if ($penyusutan < 0) {
                $penyusutan = $penyusutan * -1;
            }

            $hpp[$item->id] = $hargaBeli * $penjualan;
            $loss[$item->id] = $hargaBeli * $penyusutan;
        }

        $totalPenyusutan = array_sum($loss);
        $totalHpp = array_sum($hpp);
        $labaKotor = $totalPendapatan - $totalHpp;

        $totalPengeluaran = $totalGajiSupervisor + $totalGajiKaryawan + $totalReward + $pln + $pdam + $iuranRt + $pbb + $etc + $tipsSopir;
        $finalPengeluaran = $totalPengeluaran + $totalTebusan;

        $labaBersih = $labaKotor - $finalPengeluaran;

        return view('index', [
            'pendapatan' => $totalPendapatan,
            'totalPenyusuatan' => $totalPenyusutan,
            'totalPengeluaran' => $finalPengeluaran,
            
        ]);
    }
}
