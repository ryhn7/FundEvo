<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BBMCategoryController;
use App\Http\Controllers\PenjualanBBMController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\PenjualanItemController;
use App\Http\Controllers\KategoryItemController;

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

Route::get('/', fn () => view('index', [

]));


Route::resource('/penjualan-bbm', PenjualanBBMController::class)->except('show');
Route::get('/penjualan-bbm/filter', [PenjualanBBMController::class, 'filter']);

Route::resource('/kategori-bbm', BBMCategoryController::class)->except('show');

Route::resource('/penjualan-item', PenjualanItemController::class)->except('show');

Route::resource('/kategori-item', ItemCategoryController::class)->except('show');

Route::resource('/kategori', KategoryItemController::class)->except('show');