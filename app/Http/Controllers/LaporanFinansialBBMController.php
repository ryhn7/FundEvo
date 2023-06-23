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

    // Penjualan BBM //

    public function indexPenjualanBBM()
    {
        $bbm = BBM::all();
        $penjualanBBM = PenjualanBBM::sortable()->get();
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


        return view('SPBU.laporanFinansial.indexPenjualanBBM', [
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
            'info' => 'Penjualan',
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

        // range filter minimum 2 month
        if ($start->diffInMonths($end) < 2) {
            return redirect()->back()->with('error', 'Range filter minimal 2 bulan');
        }

        return view('SPBU.laporanFinansial.indexPenjualanBBM', [
            'sells' => $penjualanBBM,
            'count' => $penjualanBBM->count(),
            'start' => $start->locale('id')->isoFormat('MMMM '),
            'end' => $end->locale('id')->isoFormat('MMMM Y'),
            'info' => 'Penjualan',
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

        $hpp = [];
        foreach ($bbm as $item) {
            $hargaBeli = $item->harga_beli;
            $penjualan = $penjualanBBM->where('bbm_id', $item->id)->sum('penjualan');
            $hpp[$item->id] = $hargaBeli * $penjualan;
        }

        $totalHpp = array_sum($hpp);
        $keuntungan = $totalPendapatan - $totalHpp;

        return view('SPBU.laporanFinansial.indexPenjualanBBM', [
            'sells' => $penjualanBBM,
            'count' => $penjualanBBM->count(),
            'month' => Carbon::parse($month)->locale('id')->isoFormat('MMMM'),
            'year' => Carbon::parse($month)->year,
            'bbms' => $bbm,
            'totalPendapatan' => $totalPendapatan,
            'totalLiter' => $totalLiter,
            'totalPenyusutan' => $totalPenyusutan,
            'totalHpp' => $totalHpp,
            'keuntungan' => $keuntungan,
            'info' => 'Penjualan',
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
            'info' => 'Penjualan',
        ]);
    }

    // Pengeluaran BBM //

    public function indexPengeluaranSPBU()
    {
        $pengeluaranOpsBBM = PengeluaranOpsBBM::sortable()->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->get();

        return view('SPBU.laporanFinansial.indexPengeluaranOpsBBM', [
            'spends' => $pengeluaranOpsBBM,
            'count' => $pengeluaranOpsBBM->count(),
            'month' => Carbon::now()->locale('id')->isoFormat('MMMM'),
            'year' => Carbon::now()->year,
            'info' => 'Pengeluaran',
        ]);
    }

    public function rangeFilterPengeluaranSPBU(Request $request)
    {
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);

        $pengeluaranOpsBBM = PengeluaranOpsBBM::sortable()->whereBetween('created_at', [$start, $end])->get();

        if ($start->month == $end->month) {
            return redirect()->back()->with('error', 'Tanggal awal dan akhir tidak boleh dalam satu bulan');
        }

        // range filter minimum 2 month
        if ($start->diffInMonths($end) < 2) {
            return redirect()->back()->with('error', 'Range filter minimal 2 bulan');
        }

        return view('SPBU.laporanFinansial.indexPengeluaranOpsBBM', [
            'spends' => $pengeluaranOpsBBM,
            'count' => $pengeluaranOpsBBM->count(),
            'start' => $start->locale('id')->isoFormat('MMMM '),
            'end' => $end->locale('id')->isoFormat('MMMM Y'),
            'info' => 'Pengeluaran',
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
            'info' => 'Pengeluaran',
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
            'info' => 'Pengeluaran',
        ]);
    }

    // laporan Finansial //

    public function indexLaporanLabaRugi()
    {
        $bbm = BBM::all();

        //filter $penjualanBBM by month
        $penjualanBBM = PenjualanBBM::sortable()->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->get();

        $totalPendapatan = $penjualanBBM->sum('pendapatan');

        $pengeluaranOpsBBM = PengeluaranOpsBBM::sortable()->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->get();

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

        $finalPengeluaran = $totalPengeluaran + $totalTebusan + $totalPenyusutan;

        $labaBersih = $labaKotor - $finalPengeluaran;

        return view('SPBU.laporanFinansial.indexLaporanFinansial', [
            'month' => Carbon::now()->locale('id')->isoFormat('MMMM'),
            'year' => Carbon::now()->year,
            'totalPendapatan' => $totalPendapatan,
            'totalPenyusutan' => $totalPenyusutan,
            'totalHpp' => $totalHpp,
            'labaKotor' => $labaKotor,
            'tebusan' => $tebusan,
            'totalTebusan' => $totalTebusan,
            'totalGajiSupervisor' => $totalGajiSupervisor,
            'totalGajiKaryawan' => $totalGajiKaryawan,
            'totalReward' => $totalReward,
            'tipsSopir' => $tipsSopir,
            'pln' => $pln,
            'pdam' => $pdam,
            'pph' => $pph,
            'iuranRt' => $iuranRt,
            'pbb' => $pbb,
            'etc' => $etc,
            'totalPengeluaran' => $totalPengeluaran,
            'labaBersih' => $labaBersih,
        ]);
    }


    public function monthFilterLaporanLabaRugi(Request $request)
    {
        $bbm = BBM::all();
        $month = $request->month;
        $penjualanBBM = PenjualanBBM::sortable()->whereYear('created_at', Carbon::parse($month)->year)
            ->whereMonth('created_at', Carbon::parse($month)->month)->get();

        $totalPendapatan = $penjualanBBM->sum('pendapatan');

        $pengeluaranOpsBBM = PengeluaranOpsBBM::sortable()->whereYear('created_at', Carbon::parse($month)->year)
            ->whereMonth('created_at', Carbon::parse($month)->month)->get();

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

        $finalPengeluaran = $totalPengeluaran + $totalTebusan + $totalPenyusutan;

        $labaBersih = $labaKotor - $finalPengeluaran;

        return view('SPBU.laporanFinansial.indexLaporanFinansial', [
            'month' => Carbon::parse($month)->locale('id')->isoFormat('MMMM'),
            'year' => Carbon::parse($month)->year,
            'totalPendapatan' => $totalPendapatan,
            'totalPenyusutan' => $totalPenyusutan,
            'totalHpp' => $totalHpp,
            'labaKotor' => $labaKotor,
            'tebusan' => $tebusan,
            'totalTebusan' => $totalTebusan,
            'totalGajiSupervisor' => $totalGajiSupervisor,
            'totalGajiKaryawan' => $totalGajiKaryawan,
            'totalReward' => $totalReward,
            'tipsSopir' => $tipsSopir,
            'pln' => $pln,
            'pdam' => $pdam,
            'pph' => $pph,
            'iuranRt' => $iuranRt,
            'pbb' => $pbb,
            'etc' => $etc,
            'totalPengeluaran' => $totalPengeluaran,
            'labaBersih' => $labaBersih,
        ]);
    }

    public function yearFilterLaporanLabaRugi(Request $request)
    {
        $bbm = BBM::all();

        $year = $request->year;

        $penjualanBBM = PenjualanBBM::sortable()->whereYear('created_at', '=', $year)->get();

        $totalPendapatan = $penjualanBBM->sum('pendapatan');

        $pengeluaranOpsBBM = PengeluaranOpsBBM::sortable()->whereYear('created_at', '=', $year)->get();

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
            dd($penjualan);
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

        $finalPengeluaran = $totalPengeluaran + $totalTebusan + $totalPenyusutan;

        $labaBersih = $labaKotor - $finalPengeluaran;

        return view('SPBU.laporanFinansial.indexLaporanFinansial', [
            'year' => $year,
            'totalPendapatan' => $totalPendapatan,
            'totalPenyusutan' => $totalPenyusutan,
            'totalHpp' => $totalHpp,
            'labaKotor' => $labaKotor,
            'tebusan' => $tebusan,
            'totalTebusan' => $totalTebusan,
            'totalGajiSupervisor' => $totalGajiSupervisor,
            'totalGajiKaryawan' => $totalGajiKaryawan,
            'totalReward' => $totalReward,
            'tipsSopir' => $tipsSopir,
            'pln' => $pln,
            'pdam' => $pdam,
            'pph' => $pph,
            'iuranRt' => $iuranRt,
            'pbb' => $pbb,
            'etc' => $etc,
            'totalPengeluaran' => $totalPengeluaran,
            'labaBersih' => $labaBersih,
        ]);
    }
}