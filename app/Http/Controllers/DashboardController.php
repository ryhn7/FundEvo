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
        $penjualanBBM = PenjualanBBM::sortable()->get();
        $pengeluaranOpsBBM = PengeluaranOpsBBM::sortable()->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->get();
        $labels = [];
        $values = [];
        foreach ($bbm as $b) {
            $labels[] = $b->jenis_bbm;
            //get penjualan from penjualanBBM based on labels
            $values[] = $penjualanBBM->where('bbm_id', $b->id)->sum('penjualan');
        }
        // dd($labels);
        // dd($values);
        // foreach ($penjualanBBM as $row) {
        //     $labels[] = $row->region;
        //     $values[] = $row->population;
        // }

        //filter $penjualanBBM by month
        $penjualanBBM = PenjualanBBM::sortable()->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->get();


        $totalPendapatan = $penjualanBBM->sum('pendapatan');
        $totalLiter = $penjualanBBM->sum('penjualan');
        $totalPenyusutan = $penjualanBBM->sum('penyusutan');

        $hpp = [];
        foreach ($bbm as $item) {
            $hargaBeli = $item->harga_beli;
            $penjualan = $penjualanBBM->where('bbm_id', $item->id)->sum('penjualan');
            $hpp[$item->id] = $hargaBeli * $penjualan;
        }

        $totalHpp = array_sum($hpp);
        $keuntungan = $totalPendapatan - $totalHpp;
        
        $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];


        return view('index', [
            'sells' => $penjualanBBM,
            'count' => $penjualanBBM->count(),
            'bbms' => $bbm,
            'month' => Carbon::now()->locale('id')->isoFormat('MMMM'),
            'year' => Carbon::now()->year,
            'totalPendapatan' => $totalPendapatan,
            'totalLiter' => $totalLiter,
            'totalPenyusutan' => $totalPenyusutan,
            'totalHpp' => $totalHpp,
            'keuntungan' => $keuntungan,
            'spends' => $pengeluaranOpsBBM,
            'count' => $pengeluaranOpsBBM->count(),
            'bulan' => $bulan,
        ])->with('values',json_encode($values,JSON_NUMERIC_CHECK))
        ->with('labels',json_encode($labels,JSON_NUMERIC_CHECK));

    }

}
