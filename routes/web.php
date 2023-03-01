<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BBMCategoryController;
use App\Http\Controllers\LaporanFinansialBBMController;
use App\Http\Controllers\PenjualanBBMController;
use App\Http\Controllers\PengeluaranOpsBBMController;
use App\Models\BBM;

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

Route::get('/', fn () => view('index', []));
Route::get('/oke', fn () => view('tes', []));


Route::resource('/penjualan-bbm', PenjualanBBMController::class)->except('show');
Route::get('/penjualan-bbm/filter', [PenjualanBBMController::class, 'filter']);
Route::get('/penjualan-bbm/getData/{id}', [PenjualanBBMController::class, 'getHarga']); //ajax for getting harga bbm
Route::get('/penjualan-bbm/getPreviousStock/{id}', [PenjualanBBMController::class, 'getPreviousStock']); //ajax for getting previous stock
Route::get('/penjualan-bbm/checkBBM/{id}', [PenjualanBBMController::class, 'checkYesterday']); //ajax for check bbm from yesterday


Route::resource('/kategori-bbm', BBMCategoryController::class)->except('show');

Route::resource('/pengeluaran-ops-bbm', PengeluaranOpsBBMController::class)->except('show');
Route::get('/pengeluaran-ops-bbm/filter', [PengeluaranOpsBBMController::class, 'filter']);

Route::get('/LaporanFinansialSPBU/LaporanRabaRugi', [LaporanFinansialBBMController::class, 'indexLaporanFinansialSPBU']);
Route::get('/LaporanFinansialSPBU/LaporanRabaRugi/FilterBulan', [LaporanFinansialBBMController::class, 'monthFilterLaporanFinansialSPBU']);
Route::get('/LaporanFinansialSPBU/LaporanRabaRugi/FilterTahun', [LaporanFinansialBBMController::class, 'yearFilterLaporanFinansialSPBU']);
Route::get('/LaporanFinansialSPBU/LaporanRabaRugi/FilterRange', [LaporanFinansialBBMController::class, 'rangeFilterLaporanFinansialSPBU']);

Route::get('/LaporanFinansialSPBU/PenjualanBBM', [LaporanFinansialBBMController::class, 'indexPenjualanBBM']);
Route::get('/LaporanFinansialSPBU/PenjualanBBM/FilterBulan', [LaporanFinansialBBMController::class, 'monthFilterPenjualanBBM']);
Route::get('/LaporanFinansialSPBU/PenjualanBBM/FilterTahun', [LaporanFinansialBBMController::class, 'yearFilterPenjualanBBM']);
Route::get('/LaporanFinansialSPBU/PenjualanBBM/FilterRange', [LaporanFinansialBBMController::class, 'rangeFilterPenjualanBBM']);

Route::get('/LaporanFinansialSPBU/PengeluaranSPBU', [LaporanFinansialBBMController::class, 'indexPengeluaranSPBU']);
Route::get('/LaporanFinansialSPBU/PengeluaranSPBU/FilterBulan', [LaporanFinansialBBMController::class, 'monthFilterPengeluaranSPBU']);
Route::get('/LaporanFinansialSPBU/PengeluaranSPBU/FilterTahun', [LaporanFinansialBBMController::class, 'yearFilterPengeluaranSPBU']);
Route::get('/LaporanFinansialSPBU/PengeluaranSPBU/FilterRange', [LaporanFinansialBBMController::class, 'rangeFilterPengeluaranSPBU']);
