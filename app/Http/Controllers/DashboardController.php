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
        // penjualan bbm only this year
        $penjualanBBM = PenjualanBBM::whereYear('created_at', Carbon::now()->year)->get();
        $totalPendapatan = $penjualanBBM->sum('pendapatan');

        // pengeluaran ops bbm only this year
        $pengeluaranOpsBBM = PengeluaranOpsBBM::whereYear('created_at', Carbon::now()->year)->get();


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

        $labaBersih = $labaKotor - $totalPenyusutan - $finalPengeluaran;

        // REKAP OMZET PER BULAN

        $rekap = [];
        $months = [];
        $totalPendapatanPerBulan = [];
        for ($i = 1; $i <= 12; $i++) {
            $penjualanBBMPerbulan = PenjualanBBM::WhereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $i)->get();

            $tebusanPerBulan = $penjualanBBMPerbulan->sum('harga_penebusan_bbm');
            $totalGajiSupervisorPerBulan = $penjualanBBMPerbulan->sum('gaji_supervisor');
            $totalGajiKaryawanPerBulan = $penjualanBBMPerbulan->sum('gaji_karyawan');
            $totalRewardPerBulan = $penjualanBBMPerbulan->sum('reward_karyawan');
            $tipsSopirPerBulan = $penjualanBBMPerbulan->sum('tips_sopir');
            $plnPerBulan = $penjualanBBMPerbulan->sum('pln');
            $pdamPerBulan = $penjualanBBMPerbulan->sum('pdam');
            $pphPerBulan = $penjualanBBMPerbulan->sum('pph');
            $iuranRtPerBulan  = $penjualanBBMPerbulan->sum('iuran_rt');
            $pbbPerBulan = $penjualanBBMPerbulan->sum('pbb');
            $etcPerBulan = $penjualanBBMPerbulan->sum('biaya_lain');

            $totalTebusanPerBulan = $tebusanPerBulan + $pphPerBulan;

            $months[$i] = Carbon::createFromDate(null, $i, 1)->locale('id')->monthName;
            $totalPendapatanPerBulan[$i] = $penjualanBBMPerbulan->sum('pendapatan');

            $hppPerBulan = [];
            foreach ($bbm as $item) {
                $hargaBeli = $item->harga_beli;
                $penjualan = $penjualanBBMPerbulan->where('bbm_id', $item->id)->sum('penjualan');
                $penyusutan = $penjualanBBMPerbulan->where('bbm_id', $item->id)->sum('penyusutan');

                // if penyusutan < 0, then make it positive
                if ($penyusutan < 0) {
                    $penyusutan = $penyusutan * -1;
                }

                $hppPerBulan[$item->id] = $hargaBeli * $penjualan;
                $lossPerBulan[$item->id] = $hargaBeli * $penyusutan;
            }

            $totalHppPerBulan = array_sum($hppPerBulan);
            $totalPenyusutanPerBulan = array_sum($lossPerBulan);
            $totalLabaKotorPerBulan = $totalPendapatanPerBulan[$i] - $totalHppPerBulan;

            $totalPengeluaranPerBulan = $totalGajiSupervisorPerBulan + $totalGajiKaryawanPerBulan + $totalRewardPerBulan + $plnPerBulan + $pdamPerBulan + $iuranRtPerBulan + $pbbPerBulan + $etcPerBulan + $tipsSopirPerBulan;




            $rekap[] = [
                'month' => $months[$i],
                'total_pendapatan' => $totalPendapatanPerBulan[$i],
                'total_hpp_bulan' => $totalHppPerBulan,
                'total_loss_bulan' => $totalPenyusutanPerBulan,
                'total_laba_kotor_bulan' => $totalLabaKotorPerBulan,
                'total_pengeluaran_bulan' => $totalPengeluaranPerBulan,
            ];
        }

        return view('index', [
            'totalPendapatan' => $totalPendapatan,
            'totalPengeluaran' => $finalPengeluaran,
            'totalLabaKotor' => $labaKotor,
            'totalLabaBersih' => $labaBersih,
            'monthSells' => $totalPendapatanPerBulan,
            'months' => $months,
            'rekaps' => $rekap,
        ]);
    }
}
