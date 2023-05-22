<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UsulanController;
use App\Http\Controllers\PdiklatController;
use App\Http\Controllers\RdiklatController;
use App\Http\Controllers\MainwebController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SasaranController;

use App\Http\Controllers\PenetapanController;

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

/*Route::get('/', function () {
    return view('mainweb.index');
});*/

Route::get('/', [MainwebController::class, 'index'])->name('mainweb');
Route::get('home', [DashboardController::class, 'index'])->name('home')->middleware('auth');
Route::get('/downloadpdf', [DashboardController::class, 'print_pdf'])->middleware('auth');

/*Route::get('home', function(){
    return view('dashboard');
})->middleware('auth');*/


Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');


Route::resource('karyawan', KaryawanController::class)->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
route::post('/login',[LoginController::class, 'store'])->middleware("guest");
Route::resource('register', RegisterController::class)->middleware('guest');;
Route::resource('sertifikat', SertifikatController::class)->middleware('auth');
Route::resource('vendor', VendorController::class)->middleware('auth');
Route::resource('usulan', UsulanController::class)->middleware('auth');
Route::resource('sasaran', SasaranController::class)->middleware('auth');
Route::resource('penetapan', PenetapanController::class)->middleware('auth');
Route::resource('pdiklat', PdiklatController::class)->middleware('auth');
Route::resource('rdiklat', RdiklatController::class)->middleware('auth');
Route::get('activity/log', [PdiklatController::class, 'activityLog'])->middleware('auth')->name('activity/log');
