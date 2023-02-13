<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BBMCategoryController;
use App\Http\Controllers\PenjualanBBMController;
use App\Http\Controllers\PengeluaranOpsBBMController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\PenjualanItemController;
use App\Http\Controllers\KategoryItemController;
use App\Http\Controllers\PengeluaranOpsTokoListrikController;
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

Route::get('/', fn () => view('index', []));
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
Route::resource('/penebusan-bbm', PenebusanBBMController::class)->except('show');


//Item Listrik
Route::resource('/penjualan-item', PenjualanItemController::class)->except('show');
Route::get('/penjualan-item/filter', [PenjualanItemController::class, 'filter']); //ajax for filtering data based on date
Route::get('/penjualan-item/{id}', [PenjualanItemController::class, 'getItem']); //ajax for getting item
Route::get('/penjualan-item/getData/{id}', [PenjualanItemController::class, 'getHarga']); //ajax for getting harga item
Route::get('/penjualan-item/getPreviousStock/{id}', [PenjualanItemController::class, 'getPreviousStock']); //ajax for getting previous stock
Route::resource('/kategori', KategoryItemController::class)->except('show');
Route::resource('/kategori-item', ItemCategoryController::class)->except('show');
Route::resource('/pengeluaran-ops-listrik', PengeluaranOpsTokoListrikController::class)->except('show');
Route::get('/pengeluaran-ops-listrik/filter', [PengeluaranOpsTokoListrikController::class, 'filter']);

