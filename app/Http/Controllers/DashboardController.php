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


        $totalPengeluaran = $totalGajiSupervisor + $totalGajiKaryawan + $totalReward + $pln + $pdam + $iuranRt + $pbb + $etc + $tipsSopir;
        $labaKotor = $totalPendapatan - $totalHpp - $totalPengeluaran;

        $finalPengeluaran = $totalPengeluaran + $totalTebusan;

        $labaBersih = $labaKotor - $totalPenyusutan - $finalPengeluaran;


        // REKAP OMZET PER BULAN
        $labels = [];
        $values = [];
        $rekap = [];
        $months = [];
        $totalPendapatanPerBulan = [];
        for ($i = 1; $i <= 12; $i++) {
            $penjualanBBMPerbulan = PenjualanBBM::WhereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $i)->get();
            $pengeluaranOpsBBMPerbulan = PengeluaranOpsBBM::WhereYear('created_at', Carbon::now()->year)->whereMonth('created_at', $i)->get();

            $tebusanPerBulan = $pengeluaranOpsBBMPerbulan->sum('harga_penebusan_bbm');
            $totalGajiSupervisorPerBulan = $pengeluaranOpsBBMPerbulan->sum('gaji_supervisor');
            $totalGajiKaryawanPerBulan = $pengeluaranOpsBBMPerbulan->sum('gaji_karyawan');
            $totalRewardPerBulan = $pengeluaranOpsBBMPerbulan->sum('reward_karyawan');
            $tipsSopirPerBulan = $pengeluaranOpsBBMPerbulan->sum('tips_sopir');
            $plnPerBulan = $pengeluaranOpsBBMPerbulan->sum('pln');
            $pdamPerBulan = $pengeluaranOpsBBMPerbulan->sum('pdam');
            $pphPerBulan = $pengeluaranOpsBBMPerbulan->sum('pph');
            $iuranRtPerBulan  = $pengeluaranOpsBBMPerbulan->sum('iuran_rt');
            $pbbPerBulan = $pengeluaranOpsBBMPerbulan->sum('pbb');
            $etcPerBulan = $pengeluaranOpsBBMPerbulan->sum('biaya_lain');

            $totalTebusanPerBulan = $tebusanPerBulan + $pphPerBulan;

            $months[$i] = Carbon::createFromDate(null, $i, 1)->locale('id')->monthName;
            $labels[] = $months[$i];
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
            $totalLabaKotorSatuPerBulan = $totalPendapatanPerBulan[$i] - $totalHppPerBulan;

            $totalPengeluaranPerBulan = $totalGajiSupervisorPerBulan + $totalGajiKaryawanPerBulan + $totalRewardPerBulan + $plnPerBulan + $pdamPerBulan + $iuranRtPerBulan + $pbbPerBulan + $etcPerBulan + $tipsSopirPerBulan;

            // TODO: cek lagi mengenai laba kotor 2
            $totalLabaKotorDuaPerBulan = $totalLabaKotorSatuPerBulan - $totalPengeluaranPerBulan;
            $finalPengeluaranPerBulan = $totalPengeluaranPerBulan + $totalTebusanPerBulan + $totalPenyusutanPerBulan;

            $labaBersihperBulan = $totalLabaKotorSatuPerBulan - $finalPengeluaranPerBulan;
            $values[] = $labaBersihperBulan;


            $rekap[] = [
                'month' => $months[$i],
                'total_pendapatan' => $totalPendapatanPerBulan[$i],
                'total_hpp_bulan' => $totalHppPerBulan,
                'total_loss_bulan' => $totalPenyusutanPerBulan,
                'total_laba_kotorSatu_bulan' => $totalLabaKotorSatuPerBulan,
                'total_laba_kotorDua_bulan' => $totalLabaKotorDuaPerBulan,
                'total_pengeluaran_bulan' => $totalPengeluaranPerBulan,
                'laba_bersih_per_bulan' => $labaBersihperBulan,
            ];
        }

        return view('index', [
            'totalPendapatan' => $totalPendapatan,
            'totalPengeluaran' => $finalPengeluaran,
            'totalLabaKotor' => $labaKotor,
            'totalLabaBersih' => $labaBersih,
            'rekaps' => $rekap,
        ])->with('labels', json_encode($labels, JSON_NUMERIC_CHECK))
            ->with('values', json_encode($values, JSON_NUMERIC_CHECK));
    }
}
