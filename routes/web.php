<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BBMCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanFinansialBBMController;
use App\Http\Controllers\PenjualanBBMController;
use App\Http\Controllers\PenjualanOliGasController;
use App\Http\Controllers\PengeluaranOpsBBMController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\PenjualanItemController;
use App\Http\Controllers\KategoryItemController;
use App\Http\Controllers\PengeluaranOpsTokoListrikController;
use App\Http\Controllers\LaporanFinansialTokoListrikController;
use App\Http\Controllers\OliGasCategoryController;
use Illuminate\Support\Facades\Auth;

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

//PenjualanOliGas
Route::group(['middleware' => ['auth', 'checkRole:1,2']], function () {
    Route::resource('/PenjualanOliGas', PenjualanOliGasController::class)->except('show');
    Route::group(['prefix' => 'PenjualanOliGas'], function () {
        Route::get('/filter', [PenjualanOliGasController::class, 'filter']);
        Route::get('/getData/{id}', [PenjualanOliGasController::class, 'getData']); //ajax for getting nama of oli/gas
        Route::get('/getHarga/{id}', [PenjualanOliGasController::class, 'getHarga']); //ajax for getting harga of oli/gas
        Route::get('/getPreviousStock/{id}', [PenjualanOliGasController::class, 'getPreviousStock']); //ajax for getting previous stock
        Route::get('/checkOliGas/{id}', [PenjualanOliGasController::class, 'checkYesterday']); //ajax for check oli/gas from yesterday
    });
});


Route::group(['middleware' => ['auth', 'checkRole:1,2']], function () {
Route::resource('/KategoriBBM', BBMCategoryController::class)->except('show');
});

Route::group(['middleware' => ['auth', 'checkRole:1,2']], function () {
Route::resource('/KategoriOliGas', OliGasCategoryController::class)->except('show');
});


Route::group(['middleware' => ['auth', 'checkRole:1,2']], function () {
    Route::resource('/PengeluaranOperasionalSPBU', PengeluaranOpsBBMController::class)->except('show');
    Route::group(['prefix' => 'PengeluaranOperasionalSPBU'], function () {
        Route::get('/filter', [PengeluaranOpsBBMController::class, 'filter']);
        Route::get('/checkPengeluaran', [PengeluaranOpsBBMController::class, 'checkYesterday']);
    });
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

Route::group(['prefix' => 'LaporanFinansialTokoListrik', 'middleware' => ['auth', 'checkRole:1,3']], function () {

    Route::get('/LaporanRabaRugi', [LaporanFinansialTokoListrikController::class, 'indexLaporanLabaRugi']);
    Route::get('/LaporanRabaRugi/FilterBulan', [LaporanFinansialTokoListrikController::class, 'monthFilterLaporanLabaRugi']);
    Route::get('/LaporanRabaRugi/FilterTahun', [LaporanFinansialTokoListrikController::class, 'yearFilterLaporanLabaRugi']);
    Route::get('/LaporanRabaRugi/FilterRange', [LaporanFinansialTokoListrikController::class, 'rangeFilterLaporanLabaRugi']);

    Route::get('/PenjualanTokoListrik', [LaporanFinansialTokoListrikController::class, 'indexPenjualanTokoListrik']);
    Route::get('/PenjualanTokoListrik/FilterBulan', [LaporanFinansialTokoListrikController::class, 'monthFilterPenjualanItem']);
    Route::get('/PenjualanTokoListrik/FilterTahun', [LaporanFinansialTokoListrikController::class, 'yearFilterPenjualanItem']);
    Route::get('/PenjualanTokoListrik/FilterRange', [LaporanFinansialTokoListrikController::class, 'rangeFilterPenjualanItem']);

    Route::get('/PengeluaranTokoListrik', [LaporanFinansialTokoListrikController::class, 'indexPengeluaranTokoListrik']);
    Route::get('/PengeluaranTokoListrik/FilterBulan', [LaporanFinansialTokoListrikController::class, 'monthFilterPengeluaranItem']);
    Route::get('/PengeluaranTokoListrik/FilterTahun', [LaporanFinansialTokoListrikController::class, 'yearFilterPengeluaranItem']);
    Route::get('/PengeluaranTokoListrik/FilterRange', [LaporanFinansialTokoListrikController::class, 'rangeFilterPengeluaranItem']);
});


//Item Listrik
Route::middleware(['auth', 'checkRole:1,3'])->resource('/penjualan-item', PenjualanItemController::class)->except('show');
Route::middleware(['auth', 'checkRole:1,3'])->get('/penjualan-item/filter', [PenjualanItemController::class, 'filter']); //ajax for filtering penjualan item based on date
Route::middleware(['auth', 'checkRole:1,3'])->get('/penjualan-item/{id}', [PenjualanItemController::class, 'getItem']); //ajax for getting item
Route::middleware(['auth', 'checkRole:1,3'])->get('/penjualan-item/getData/{id}', [PenjualanItemController::class, 'getHarga']); //ajax for getting harga item
Route::middleware(['auth', 'checkRole:1,3'])->get('/penjualan-item/getPreviousStock/{id}', [PenjualanItemController::class, 'getPreviousStock']); //ajax for getting previous stock
Route::middleware(['auth', 'checkRole:1,3'])->resource('/kategori', KategoryItemController::class)->except('show');
Route::middleware(['auth', 'checkRole:1,3'])->resource('/kategori-item', ItemCategoryController::class)->except('show');
Route::middleware(['auth', 'checkRole:1,3'])->resource('/pengeluaran-ops-listrik', PengeluaranOpsTokoListrikController::class)->except('show');
Route::middleware(['auth', 'checkRole:1,3'])->get('/pengeluaran-ops-listrik/filter', [PengeluaranOpsTokoListrikController::class, 'filter']); //ajax for filtering pengeluaran item based on date
Route::middleware(['auth', 'checkRole:1,3'])->get('/penjualan-item/checkItem/{id}', [PenjualanItemController::class, 'checkYesterday']); //ajax for check item from yesterday


// Route::get('/LaporanFinansialBBM/PengeluaranSPBU', [LaporanFinansialBBMController::class, 'indexPengeluaranSPBU']);
// Route::get('/LaporanFinansialBBM/PengeluaranSPBU/FilterBulan', [LaporanFinansialBBMController::class, 'monthFilterPengeluaranSPBU']);
// Route::get('/LaporanFinansialBBM/PengeluaranSPBU/FilterTahun', [LaporanFinansialBBMController::class, 'yearFilterPengeluaranSPBU']);
// Route::get('/LaporanFinansialBBM/PengeluaranSPBU/FilterRange', [LaporanFinansialBBMController::class, 'rangeFilterPengeluaranSPBU']);

// Route::middleware(['auth', 'checkRole:1,3'])->get('/LaporanFinansialTokoListrik/PenjualanTokoListrik', [LaporanFinansialTokoListrikController::class, 'indexPenjualanTokoListrik']);
// Route::middleware(['auth', 'checkRole:1,3'])->get('/LaporanFinansialTokoListrik/PenjualanTokoListrik/FilterBulan', [LaporanFinansialTokoListrikController::class, 'monthFilterPenjualanItem']);
// Route::middleware(['auth', 'checkRole:1,3'])->get('/LaporanFinansialTokoListrik/PenjualanTokoListrik/FilterTahun', [LaporanFinansialTokoListrikController::class, 'yearFilterPenjualanItem']);
// Route::middleware(['auth', 'checkRole:1,3'])->get('/LaporanFinansialTokoListrik/PenjualanTokoListrik/FilterRange', [LaporanFinansialTokoListrikController::class, 'rangeFilterPenjualanItem']);

// Route::middleware(['auth', 'checkRole:1,3'])->get('/LaporanFinansialTokoListrik/PengeluaranTokoListrik', [LaporanFinansialTokoListrikController::class, 'indexPengeluaranTokoListrik']);
// Route::middleware(['auth', 'checkRole:1,3'])->get('/LaporanFinansialTokoListrik/PengeluaranTokoListrik/FilterBulan', [LaporanFinansialTokoListrikController::class, 'monthFilterPengeluaranItem']);
// Route::middleware(['auth', 'checkRole:1,3'])->get('/LaporanFinansialTokoListrik/PengeluaranTokoListrik/FilterTahun', [LaporanFinansialTokoListrikController::class, 'yearFilterPengeluaranItem']);
// Route::middleware(['auth', 'checkRole:1,3'])->get('/LaporanFinansialTokoListrik/PengeluaranTokoListrik/FilterRange', [LaporanFinansialTokoListrikController::class, 'rangeFilterPengeluaranItem']);

// Route::get('/LaporanFinansialSPBU/PenjualanBBM', [LaporanFinansialBBMController::class, 'indexPenjualanBBM']);
// Route::get('/LaporanFinansialSPBU/PenjualanBBM/FilterBulan', [LaporanFinansialBBMController::class, 'monthFilterPenjualanBBM']);
// Route::get('/LaporanFinansialSPBU/PenjualanBBM/FilterTahun', [LaporanFinansialBBMController::class, 'yearFilterPenjualanBBM']);
// Route::get('/LaporanFinansialSPBU/PenjualanBBM/FilterRange', [LaporanFinansialBBMController::class, 'rangeFilterPenjualanBBM']);

// Route::get('/LaporanFinansialSPBU/PengeluaranSPBU', [LaporanFinansialBBMController::class, 'indexPengeluaranSPBU']);
// Route::get('/LaporanFinansialSPBU/PengeluaranSPBU/FilterBulan', [LaporanFinansialBBMController::class, 'monthFilterPengeluaranSPBU']);
// Route::get('/LaporanFinansialSPBU/PengeluaranSPBU/FilterTahun', [LaporanFinansialBBMController::class, 'yearFilterPengeluaranSPBU']);
// Route::get('/LaporanFinansialSPBU/PengeluaranSPBU/FilterRange', [LaporanFinansialBBMController::class, 'rangeFilterPengeluaranSPBU']);
