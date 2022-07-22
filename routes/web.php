<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pendataan', [HomeController::class, 'pendataan'])->name('pendataan');
Route::post('/pendataan/store', [HomeController::class, 'pendataanStore'])->name('pendataanStore');
Route::post('/pendataan/update', [HomeController::class, 'pendataanUpdate'])->name('pendataanUpdate');

Route::get('/rekap', [HomeController::class, 'rekap'])->name('rekap');
Route::get('/rekap/create', [HomeController::class, 'rekapCreate'])->name('rekapCreate');
Route::get('/rekap/show/{id}', [HomeController::class, 'rekapShow'])->name('rekapShow');
Route::post('/rekap/update', [HomeController::class, 'rekapUpdate'])->name('rekapUpdate');
Route::get('/rekap/edit/{id}', [HomeController::class, 'rekapEdit'])->name('rekapEdit');
Route::get('/rekap/delete/{id}', [HomeController::class, 'rekapDelete'])->name('rekapDelete');
Route::get('/rekap/tambah', [HomeController::class, 'rekapTambah'])->name('rekapTambah');
Route::post('/rekap/store', [HomeController::class, 'rekapStore'])->name('rekapStore');
