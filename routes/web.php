<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BBMCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanFinansialBBMController;
use App\Http\Controllers\PenjualanBBMController;
use App\Http\Controllers\PengeluaranOpsBBMController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\PenjualanItemController;
use App\Http\Controllers\KategoryItemController;
use App\Http\Controllers\PengeluaranOpsTokoListrikController;
use App\Http\Controllers\LaporanFinansialTokoListrikController;
use App\Models\BBM;
use App\Models\Item;
use App\Models\PengeluaranOpsTokoListrik;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', fn () => view('index', []));
Route::get('/Dashboard/SPBU', [DashboardController::class, 'indexDashboardSPBU']);


Route::get('/oke', fn () => view('tes', []));

//BBM
Route::resource('/penjualan-bbm', PenjualanBBMController::class)->except('show');
Route::get('/penjualan-bbm/filter', [PenjualanBBMController::class, 'filter']);
Route::get('/penjualan-bbm/getData/{id}', [PenjualanBBMController::class, 'getHarga']); //ajax for getting harga bbm
Route::get('/penjualan-bbm/getPreviousStock/{id}', [PenjualanBBMController::class, 'getPreviousStock']); //ajax for getting previous stock
Route::get('/penjualan-bbm/checkBBM/{id}', [PenjualanBBMController::class, 'checkYesterday']); //ajax for check bbm from yesterday


Route::resource('/kategori-bbm', BBMCategoryController::class)->except('show');

Route::resource('/pengeluaran-ops-bbm', PengeluaranOpsBBMController::class)->except('show');
Route::get('/pengeluaran-ops-bbm/filter', [PengeluaranOpsBBMController::class, 'filter']);

Route::get('/LaporanFinansialSPBU/LaporanRabaRugi', [LaporanFinansialBBMController::class, 'indexLaporanLabaRugi']);
Route::get('/LaporanFinansialSPBU/LaporanRabaRugi/FilterBulan', [LaporanFinansialBBMController::class, 'monthFilterLaporanLabaRugi']);
Route::get('/LaporanFinansialSPBU/LaporanRabaRugi/FilterTahun', [LaporanFinansialBBMController::class, 'yearFilterLaporanLabaRugi']);
Route::get('/LaporanFinansialSPBU/LaporanRabaRugi/FilterRange', [LaporanFinansialBBMController::class, 'rangeFilterLaporanLabaRugi']);

Route::get('/LaporanFinansialTokoListrik/LaporanRabaRugi', [LaporanFinansialTokoListrikController::class, 'indexLaporanLabaRugi']);
Route::get('/LaporanFinansialTokoListrik/LaporanRabaRugi/FilterBulan', [LaporanFinansialTokoListrikController::class, 'monthFilterLaporanLabaRugi']);
Route::get('/LaporanFinansialTokoListrik/LaporanRabaRugi/FilterTahun', [LaporanFinansialTokoListrikController::class, 'yearFilterLaporanLabaRugi']);
Route::get('/LaporanFinansialTokoListrik/LaporanRabaRugi/FilterRange', [LaporanFinansialTokoListrikController::class, 'rangeFilterLaporanLabaRugi']);

//Item Listrik
Route::resource('/penjualan-item', PenjualanItemController::class)->except('show');
Route::get('/penjualan-item/filter', [PenjualanItemController::class, 'filter']); //ajax for filtering penjualan item based on date
Route::get('/penjualan-item/{id}', [PenjualanItemController::class, 'getItem']); //ajax for getting item
Route::get('/penjualan-item/getData/{id}', [PenjualanItemController::class, 'getHarga']); //ajax for getting harga item
Route::get('/penjualan-item/getPreviousStock/{id}', [PenjualanItemController::class, 'getPreviousStock']); //ajax for getting previous stock
Route::resource('/kategori', KategoryItemController::class)->except('show');
Route::resource('/kategori-item', ItemCategoryController::class)->except('show');
Route::resource('/pengeluaran-ops-listrik', PengeluaranOpsTokoListrikController::class)->except('show');
Route::get('/pengeluaran-ops-listrik/filter', [PengeluaranOpsTokoListrikController::class, 'filter']);//ajax for filtering pengeluaran item based on date
Route::get('/penjualan-item/checkItem/{id}', [PenjualanItemController::class, 'checkYesterday']); //ajax for check item from yesterday



Route::get('/LaporanFinansialBBM/PengeluaranSPBU', [LaporanFinansialBBMController::class, 'indexPengeluaranSPBU']);
Route::get('/LaporanFinansialBBM/PengeluaranSPBU/FilterBulan', [LaporanFinansialBBMController::class, 'monthFilterPengeluaranSPBU']);
Route::get('/LaporanFinansialBBM/PengeluaranSPBU/FilterTahun', [LaporanFinansialBBMController::class, 'yearFilterPengeluaranSPBU']);
Route::get('/LaporanFinansialBBM/PengeluaranSPBU/FilterRange', [LaporanFinansialBBMController::class, 'rangeFilterPengeluaranSPBU']);

Route::get('/LaporanFinansialTokoListrik/PenjualanTokoListrik', [LaporanFinansialTokoListrikController::class, 'indexPenjualanTokoListrik']);
Route::get('/LaporanFinansialTokoListrik/PenjualanTokoListrik/FilterBulan', [LaporanFinansialTokoListrikController::class, 'monthFilterPenjualanItem']);
Route::get('/LaporanFinansialTokoListrik/PenjualanTokoListrik/FilterTahun', [LaporanFinansialTokoListrikController::class, 'yearFilterPenjualanItem']);
Route::get('/LaporanFinansialTokoListrik/PenjualanTokoListrik/FilterRange', [LaporanFinansialTokoListrikController::class, 'rangeFilterPenjualanItem']);

Route::get('/LaporanFinansialTokoListrik/PengeluaranTokoListrik', [LaporanFinansialTokoListrikController::class, 'indexPengeluaranTokoListrik']);
Route::get('/LaporanFinansialTokoListrik/PengeluaranTokoListrik/FilterBulan', [LaporanFinansialTokoListrikController::class, 'monthFilterPengeluaranItem']);
Route::get('/LaporanFinansialTokoListrik/PengeluaranTokoListrik/FilterTahun', [LaporanFinansialTokoListrikController::class, 'yearFilterPengeluaranItem']);
Route::get('/LaporanFinansialTokoListrik/PengeluaranTokoListrik/FilterRange', [LaporanFinansialTokoListrikController::class, 'rangeFilterPengeluaranItem']);
Route::get('/LaporanFinansialSPBU/PenjualanBBM', [LaporanFinansialBBMController::class, 'indexPenjualanBBM']);
Route::get('/LaporanFinansialSPBU/PenjualanBBM/FilterBulan', [LaporanFinansialBBMController::class, 'monthFilterPenjualanBBM']);
Route::get('/LaporanFinansialSPBU/PenjualanBBM/FilterTahun', [LaporanFinansialBBMController::class, 'yearFilterPenjualanBBM']);
Route::get('/LaporanFinansialSPBU/PenjualanBBM/FilterRange', [LaporanFinansialBBMController::class, 'rangeFilterPenjualanBBM']);

Route::get('/LaporanFinansialSPBU/PengeluaranSPBU', [LaporanFinansialBBMController::class, 'indexPengeluaranSPBU']);
Route::get('/LaporanFinansialSPBU/PengeluaranSPBU/FilterBulan', [LaporanFinansialBBMController::class, 'monthFilterPengeluaranSPBU']);
Route::get('/LaporanFinansialSPBU/PengeluaranSPBU/FilterTahun', [LaporanFinansialBBMController::class, 'yearFilterPengeluaranSPBU']);
Route::get('/LaporanFinansialSPBU/PengeluaranSPBU/FilterRange', [LaporanFinansialBBMController::class, 'rangeFilterPengeluaranSPBU']);
