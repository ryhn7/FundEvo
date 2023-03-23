<?php

use App\Http\Controllers\AuthenticationController;
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


// if user want to access page / and not logged in, redirect to login page else redirect to dashboard
Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role_id === 1) {
            return redirect()->intended('/Dashboard/SPBU');
        } else if (Auth::user()->role_id === 2) {
            return redirect()->intended('/Dashboard/SPBU');
        } else if (Auth::user()->role_id === 3) {
            return redirect()->intended('/Dashboard/TokoListrik');
        } else {
            return redirect()->intended('/Dashboard/SPBU');
        }
    } else {
        return redirect()->intended('/login');
    }
});


Route::get('/Dashboard/SPBU', [DashboardController::class, 'indexDashboardSPBU'])->middleware('auth', 'checkRole:1,2');
Route::get('/Dashboard/TokoListrik', [DashboardController::class, 'indexDashboardTokoListrik'])->middleware('auth', 'checkRole:1,3');

Route::get('/login', [AuthenticationController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticationController::class, 'login'])->middleware('guest')->name('login');
Route::post('/logout', [AuthenticationController::class, 'logout'])->middleware('auth')->name('logout');


Route::get('/oke', fn () => view('tes', []));

//PenjualanBBM
Route::group(['middleware' => ['auth', 'checkRole:1,2']], function () {
    Route::resource('/PenjualanBBM', PenjualanBBMController::class)->except('show');
    Route::group(['prefix' => 'PenjualanBBM'], function () {
        Route::get('/filter', [PenjualanBBMController::class, 'filter']);
        Route::get('/getData/{id}', [PenjualanBBMController::class, 'getHarga']); //ajax for getting harga bbm
        Route::get('/getPreviousStock/{id}', [PenjualanBBMController::class, 'getPreviousStock']); //ajax for getting previous stock
        Route::get('/checkBBM/{id}', [PenjualanBBMController::class, 'checkYesterday']); //ajax for check bbm from yesterday
    });
});




Route::resource('/kategori-bbm', BBMCategoryController::class)->except('show')->middleware('auth', 'checkRole:1,2');


Route::resource('/pengeluaran-ops-bbm', PengeluaranOpsBBMController::class)->except('show');


Route::group(['prefix' => 'pengeluaran-ops-bbm', 'middleware' => ['auth', 'checkRole:1,2']], function () {
    // Route::resource('/', PengeluaranOpsBBMController::class)->except('show');
    Route::get('/filter', [PengeluaranOpsBBMController::class, 'filter']);
});


Route::group(['prefix' => 'LaporanFinansialSPBU', 'middleware' => ['auth', 'checkRole:1,2']], function () {

    Route::get('/LaporanRabaRugi', [LaporanFinansialBBMController::class, 'indexLaporanLabaRugi']);
    Route::get('/LaporanRabaRugi/FilterBulan', [LaporanFinansialBBMController::class, 'monthFilterLaporanLabaRugi']);
    Route::get('/LaporanRabaRugi/FilterTahun', [LaporanFinansialBBMController::class, 'yearFilterLaporanLabaRugi']);
    Route::get('/LaporanRabaRugi/FilterRange', [LaporanFinansialBBMController::class, 'rangeFilterLaporanLabaRugi']);

    Route::get('/PenjualanBBM', [LaporanFinansialBBMController::class, 'indexPenjualanBBM']);
    Route::get('/PenjualanBBM/FilterBulan', [LaporanFinansialBBMController::class, 'monthFilterPenjualanBBM']);
    Route::get('/PenjualanBBM/FilterTahun', [LaporanFinansialBBMController::class, 'yearFilterPenjualanBBM']);
    Route::get('/PenjualanBBM/FilterRange', [LaporanFinansialBBMController::class, 'rangeFilterPenjualanBBM']);

    Route::get('/PengeluaranSPBU', [LaporanFinansialBBMController::class, 'indexPengeluaranSPBU']);
    Route::get('/PengeluaranSPBU/FilterBulan', [LaporanFinansialBBMController::class, 'monthFilterPengeluaranSPBU']);
    Route::get('/PengeluaranSPBU/FilterTahun', [LaporanFinansialBBMController::class, 'yearFilterPengeluaranSPBU']);
    Route::get('/PengeluaranSPBU/FilterRange', [LaporanFinansialBBMController::class, 'rangeFilterPengeluaranSPBU']);
});

//Item Listrik
Route::resource('/penjualan-item', PenjualanItemController::class)->except('show');
Route::get('/penjualan-item/filter', [PenjualanItemController::class, 'filter']); //ajax for filtering penjualan item based on date
Route::get('/penjualan-item/{id}', [PenjualanItemController::class, 'getItem']); //ajax for getting item
Route::get('/penjualan-item/getData/{id}', [PenjualanItemController::class, 'getHarga']); //ajax for getting harga item
Route::get('/penjualan-item/getPreviousStock/{id}', [PenjualanItemController::class, 'getPreviousStock']); //ajax for getting previous stock
Route::resource('/kategori', KategoryItemController::class)->except('show');
Route::resource('/kategori-item', ItemCategoryController::class)->except('show');
Route::resource('/pengeluaran-ops-listrik', PengeluaranOpsTokoListrikController::class)->except('show');
Route::get('/pengeluaran-ops-listrik/filter', [PengeluaranOpsTokoListrikController::class, 'filter']); //ajax for filtering pengeluaran item based on date
Route::get('/penjualan-item/checkItem/{id}', [PenjualanItemController::class, 'checkYesterday']); //ajax for check item from yesterday



Route::get('/LaporanFinansialTokoListrik', [LaporanFinansialTokoListrikController::class, 'index']);
Route::get('/LaporanFinansialTokoListrik/PenjualanItem/FilterBulan', [LaporanFinansialTokoListrikController::class, 'monthFilterPenjualanItem']);
Route::get('/LaporanFinansialTokoListrik/PenjualanItem/FilterTahun', [LaporanFinansialTokoListrikController::class, 'yearFilterPenjualanItem']);
Route::get('/LaporanFinansialTokoListrik/PenjualanItem/FilterRange', [LaporanFinansialTokoListrikController::class, 'rangeFilterPenjualanItem']);
