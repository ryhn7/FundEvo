<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\KategoriItem;
use App\Models\PengeluaranOpsTokoListrik;
use Illuminate\Http\Request;
use App\Models\PenjualanItemListrik;
use Carbon\Carbon;

class LaporanFinansialTokoListrikController extends Controller
{
    public function indexPenjualanTokoListrik()
    {
        $barang = Item::all();

        //filter $penjualanBBM by month
        $penjualanItem = PenjualanItemListrik::sortable()->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->get();


        $totalPendapatan = $penjualanItem->sum('pendapatan');
        $totalTerjual = $penjualanItem->sum('penjualan');
        $totalPenyusutan = $penjualanItem->sum('penyusutan');

        $hpp = [];
        foreach ($barang as $item) {
            $hargaBeli = $item->harga_beli;
            $penjualan = $penjualanItem->where('item_id', $item->id)->sum('penjualan');
            $hpp[$item->id] = $hargaBeli * $penjualan;
        }

        $totalHpp = array_sum($hpp);
        $keuntungan = $totalPendapatan - $totalHpp;
        $kategori = KategoriItem::all();


        return view('TokoListrik.laporanFinansial.indexPenjualanItem', [
            'sells' => $penjualanItem,
            'count' => $penjualanItem->count(),
            'barang' => $barang,
            'month' => Carbon::now()->locale('id')->isoFormat('MMMM'),
            'year' => Carbon::now()->year,
            'totalPendapatan' => $totalPendapatan,
            'totalTerjual' => $totalTerjual,
            'totalPenyusutan' => $totalPenyusutan,
            'totalHpp' => $totalHpp,
            'keuntungan' => $keuntungan,
            'info' => 'Penjualan',
            'kategoris' => $kategori,
        ]);
    }

    public function indexPengeluaranTokoListrik()
    {
        $pengeluaranOpsTokoListrik = PengeluaranOpsTokoListrik::sortable()->get();
        return view('TokoListrik.laporanFinansial.indexPengeluaranOpsTokoListrik', [
            'spends' => $pengeluaranOpsTokoListrik,
            'count' => $pengeluaranOpsTokoListrik->count(),
            'info' => 'Penjualan',
            'month' => Carbon::now()->locale('id')->isoFormat('MMMM'),
            'year' => Carbon::now()->year,
        ]);
    }

    // filter by month
    public function rangeFilterPenjualanItem(Request $request)
    {
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);

        $penjualanItem = PenjualanItemListrik::sortable()->whereBetween('created_at', [$start, $end])->get();
        if ($start->month == $end->month) {
            return redirect()->back()->with('error', 'Tanggal awal dan akhir tidak boleh dalam satu bulan');
        }

        // range filter minimum 2 month
        if ($start->diffInMonths($end) < 2) {
            return redirect()->back()->with('error', 'Range filter minimal 2 bulan');
        }
        return view('TokoListrik.laporanFinansial.indexPenjualanItem', [
            'sells' => $penjualanItem,
            'count' => $penjualanItem->count(),
            'start' => $start->locale('id')->isoFormat('MMMM '),
            'end' => $end->locale('id')->isoFormat('MMMM Y'),
            'info' => 'Penjualan',
        ]);
    }

    public function monthFilterPenjualanItem(Request $request)
    {
        $barang = Item::all();
        $kategori = KategoriItem::all();
        $month = $request->month;
        $penjualanItem = PenjualanItemListrik::sortable()->whereYear('created_at', Carbon::parse($month)->year)
            ->whereMonth('created_at', Carbon::parse($month)->month)->get();
        $totalPendapatan = $penjualanItem->sum('pendapatan');
        $totalTerjual = $penjualanItem->sum('penjualan');
        $totalPenyusutan = $penjualanItem->sum('penyusutan');
        

        $hpp = [];
        foreach ($barang as $item) {
            $hargaBeli = $item->harga_beli;
            $penjualan = $penjualanItem->where('item_id', $item->id)->sum('penjualan');
            $hpp[$item->id] = $hargaBeli * $penjualan;
        }

        $totalHpp = array_sum($hpp);
        $keuntungan = $totalPendapatan - $totalHpp;

        return view('TokoListrik.laporanFinansial.indexPenjualanItem', [
            'sells' => $penjualanItem,
            'count' => $penjualanItem->count(),
            'month' => Carbon::parse($month)->locale('id')->isoFormat('MMMM'),
            'totalPendapatan' => $totalPendapatan,
            'year' => Carbon::now()->year,
            'totalTerjual' => $totalTerjual,
            'totalPenyusutan' => $totalPenyusutan,
            'totalHpp' => $totalHpp,
            'keuntungan' => $keuntungan,
            'info' => 'Penjualan',
            'kategoris' => $kategori,
        ]);
    }

    public function yearFilterPenjualanItem(Request $request)
    {
        $year = $request->year;
        $penjualanItem = PenjualanItemListrik::sortable()->whereYear('created_at', '=', $year)->get();

        return view('TokoListrik.laporanFinansial.indexPenjualanItem', [
            'sells' => $penjualanItem,
            'count' => $penjualanItem->count(),
            'year' => $year,
            'info' => 'Penjualan',
        ]);
    }

    public function rangeFilterPengeluaranItem(Request $request)
    {
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);

        $pengeluaranOpsTokoListrik = PengeluaranOpsTokoListrik::sortable()->whereBetween('created_at', [$start, $end])->get();

        return view('TokoListrik.laporanFinansial.indexPengeluaranOpsTokoListrik', [
            'spends' => $pengeluaranOpsTokoListrik,
            'count' => $pengeluaranOpsTokoListrik->count(),
            'start' => $start->locale('id')->isoFormat('MMMM '),
            'end' => $end->locale('id')->isoFormat('MMMM Y'),
            'info' => 'Penjualan',
        ]);
    }

    public function monthFilterPengeluaranItem(Request $request)
    {
        $month = $request->month;
        $pengeluaranOpsTokoListrik = PengeluaranOpsTokoListrik::sortable()->whereYear('created_at', Carbon::parse($month)->year)
            ->whereMonth('created_at', Carbon::parse($month)->month)->get();

        return view('TokoListrik.laporanFinansial.indexPengeluaranOpsTokoListrik', [
            'spends' => $pengeluaranOpsTokoListrik,
            'count' => $pengeluaranOpsTokoListrik->count(),
            'month' => Carbon::parse($month)->locale('id')->isoFormat('MMMM'),
            'info' => 'Penjualan',
        ]);
    }

    public function yearFilterPengeluaranItem(Request $request)
    {
        $year = $request->year;
        $pengeluaranOpsTokoListrik = PengeluaranOpsTokoListrik::sortable()->whereYear('created_at', '=', $year)->get();

        return view('TokoListrik.laporanFinansial.indexPengeluaranOpsTokoListrik', [
            'spends' => $pengeluaranOpsTokoListrik,
            'count' => $pengeluaranOpsTokoListrik->count(),
            'year' => $year,
            'info' => 'Penjualan',
        ]);
    }

    public function indexLaporanLabaRugi()
    {
        $barang = Item::all();

        //filter $penjualanBBM by month
        $penjualanItem = PenjualanItemListrik::sortable()->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->get();

        $totalPendapatan = $penjualanItem->sum('pendapatan');

        $pengeluaranOpsTokoListrik = PengeluaranOpsTokoListrik::sortable()->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->get();

        $kulakan = $pengeluaranOpsTokoListrik->sum('biaya_kulakan');
        // $totalGajiSupervisor = $pengeluaranOpsTokoListrik->sum('gaji_supervisor');
        $totalGajiKaryawan = $pengeluaranOpsTokoListrik->sum('gaji_karyawan');
        $totalReward = $pengeluaranOpsTokoListrik->sum('reward_karyawan');
        // $tipsSopir = $pengeluaranOpsTokoListrik->sum('tips_sopir');
        // $pln = $pengeluaranOpsTokoListrik->sum('pln');
        // $pdam = $pengeluaranOpsTokoListrik->sum('pdam');
        // $pph = $pengeluaranOpsTokoListrik->sum('pph');
        // $iuranRt  = $pengeluaranOpsTokoListrik->sum('iuran_rt');
        $pbb = $pengeluaranOpsTokoListrik->sum('pbb');
        $etc = $pengeluaranOpsTokoListrik->sum('biaya_lain');

        $totalKulakan = $kulakan;
        $pengeluaranOpsTokoListrik = PengeluaranOpsTokoListrik::sortable()->get();
        $hpp = [];
        foreach ($barang as $item) {
            $hargaBeli = $item->harga_beli;
            $penjualan = $penjualanItem->where('item_id', $item->id)->sum('penjualan');
            $penyusutan = $penjualanItem->where('item_id', $item->id)->sum('penyusutan');

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

        $totalPengeluaran =  + $totalGajiKaryawan + $totalReward + $pbb + $etc;
        $finalPengeluaran = $totalPengeluaran + $totalKulakan + $totalPenyusutan;

        $labaBersih = $labaKotor - $finalPengeluaran;

        return view('TokoListrik.laporanFinansial.indexLaporanFinansial', [
            'month' => Carbon::now()->locale('id')->isoFormat('MMMM'),
            'year' => Carbon::now()->year,
            'totalPendapatan' => $totalPendapatan,
            'barang' => $barang,
            'totalPenyusutan' => $totalPenyusutan,
            'totalHpp' => $totalHpp,
            'labaKotor' => $labaKotor,
            'kulakan' => $kulakan,
            'totalKulakan' => $totalKulakan,
            'totalGajiKaryawan' => $totalGajiKaryawan,
            'totalReward' => $totalReward,
            'pbb' => $pbb,
            'etc' => $etc,
            'totalPengeluaran' => $totalPengeluaran,
            'labaBersih' => $labaBersih,
            'info' => 'Penjualan',
        ]);
    }


    public function monthFilterLaporanLabaRugi(Request $request)
    {
        $barang = Item::all();
        $month = $request->month;
        $penjualanItem = PenjualanItemListrik::sortable()->whereYear('created_at', Carbon::parse($month)->year)
            ->whereMonth('created_at', Carbon::parse($month)->month)->get();

        $totalPendapatan = $penjualanItem->sum('pendapatan');

        $pengeluaranOpsTokoListrik = PengeluaranOpsTokoListrik::sortable()->whereYear('created_at', Carbon::parse($month)->year)
            ->whereMonth('created_at', Carbon::parse($month)->month)->get();

        $kulakan = $pengeluaranOpsTokoListrik->sum('harga_penebusan_bbm');
        // $totalGajiSupervisor = $pengeluaranOpsTokoListrik->sum('gaji_supervisor');
        $totalGajiKaryawan = $pengeluaranOpsTokoListrik->sum('gaji_karyawan');
        $totalReward = $pengeluaranOpsTokoListrik->sum('reward_karyawan');
        // $tipsSopir = $pengeluaranOpsTokoListrik->sum('tips_sopir');
        // $pln = $pengeluaranOpsTokoListrik->sum('pln');
        // $pdam = $pengeluaranOpsTokoListrik->sum('pdam');
        // $pph = $pengeluaranOpsTokoListrik->sum('pph');
        // $iuranRt  = $pengeluaranOpsTokoListrik->sum('iuran_rt');
        $pbb = $pengeluaranOpsTokoListrik->sum('pbb');
        $etc = $pengeluaranOpsTokoListrik->sum('biaya_lain');

        $totalKulakan = $kulakan;

        $hpp = [];
        foreach ($barang as $item) {
            $hargaBeli = $item->harga_beli;
            $penjualan = $penjualanItem->where('item_id', $item->id)->sum('penjualan');
            $penyusutan = $penjualanItem->where('item_id', $item->id)->sum('penyusutan');

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

        $totalPengeluaran = $totalGajiKaryawan + $totalReward + $pbb + $etc;
        $finalPengeluaran = $totalPengeluaran + $totalKulakan + $totalPenyusutan;

        $labaBersih = $labaKotor - $finalPengeluaran;

        return view('TokoListrik.laporanFinansial.indexLaporanFinansial', [
            'month' => Carbon::parse($month)->locale('id')->isoFormat('MMMM'),
            'year' => Carbon::parse($month)->year,
            'totalPendapatan' => $totalPendapatan,
            'totalPenyusutan' => $totalPenyusutan,
            'totalHpp' => $totalHpp,
            'labaKotor' => $labaKotor,
            'kulakan' => $kulakan,
            'totalKulakan' => $totalKulakan,
            'totalGajiKaryawan' => $totalGajiKaryawan,
            'totalReward' => $totalReward,
            'info' => 'Penjualan',
            'pbb' => $pbb,
            'etc' => $etc,
            'totalPengeluaran' => $totalPengeluaran,
            'labaBersih' => $labaBersih,
            'barang' => $barang,
        ]);
    }

    public function yearFilterLaporanLabaRugi(Request $request)
    {
        $barang = Item::all();
        $year = $request->year;
        $penjualanItem = PenjualanItemListrik::sortable()->whereYear('created_at', Carbon::parse($year)->year)
            ->whereYear('created_at', Carbon::parse($year)->year)->get();

        $totalPendapatan = $penjualanItem->sum('pendapatan');

        $pengeluaranOpsTokoListrik = PengeluaranOpsTokoListrik::sortable()->whereYear('created_at', Carbon::parse($year)->year)
            ->whereYear('created_at', Carbon::parse($year)->year)->get();

        $kulakan = $pengeluaranOpsTokoListrik->sum('harga_penebusan_bbm');
        // $totalGajiSupervisor = $pengeluaranOpsTokoListrik->sum('gaji_supervisor');
        $totalGajiKaryawan = $pengeluaranOpsTokoListrik->sum('gaji_karyawan');
        $totalReward = $pengeluaranOpsTokoListrik->sum('reward_karyawan');
        // $tipsSopir = $pengeluaranOpsTokoListrik->sum('tips_sopir');
        // $pln = $pengeluaranOpsTokoListrik->sum('pln');
        // $pdam = $pengeluaranOpsTokoListrik->sum('pdam');
        // $pph = $pengeluaranOpsTokoListrik->sum('pph');
        // $iuranRt  = $pengeluaranOpsTokoListrik->sum('iuran_rt');
        $pbb = $pengeluaranOpsTokoListrik->sum('pbb');
        $etc = $pengeluaranOpsTokoListrik->sum('biaya_lain');

        $totalKulakan = $kulakan;

        $hpp = [];
        foreach ($barang as $item) {
            $hargaBeli = $item->harga_beli;
            $penjualan = $penjualanItem->where('item_id', $item->id)->sum('penjualan');
            $penyusutan = $penjualanItem->where('item_id', $item->id)->sum('penyusutan');

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

        $totalPengeluaran = $totalGajiKaryawan + $totalReward + $pbb + $etc;
        $finalPengeluaran = $totalPengeluaran + $totalKulakan + $totalPenyusutan;

        $labaBersih = $labaKotor - $finalPengeluaran;
        

        return view('TokoListrik.laporanFinansial.indexLaporanFinansial', [
            'year' => Carbon::parse($year)->year,
            'totalPendapatan' => $totalPendapatan,
            'totalPenyusutan' => $totalPenyusutan,
            'info' => 'Penjualan',
            'totalHpp' => $totalHpp,
            'labaKotor' => $labaKotor,
            'kulakan' => $kulakan,
            'totalKulakan' => $totalKulakan,
            'totalGajiKaryawan' => $totalGajiKaryawan,
            'totalReward' => $totalReward,
            'pbb' => $pbb,
            'barang' => $barang,
            'etc' => $etc,
            'totalPengeluaran' => $totalPengeluaran,
            'labaBersih' => $labaBersih,
        ]);
    }  
    
}
