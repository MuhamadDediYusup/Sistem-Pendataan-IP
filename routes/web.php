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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pendataan', [HomeController::class, 'pendataan'])->name('pendataan');
Route::get('/rekap', [HomeController::class, 'rekap'])->name('rekap');
Route::get('/rekap/create', [HomeController::class, 'rekapCreate'])->name('rekapCreate');
Route::get('/rekap/edit/{id}', [HomeController::class, 'rekapEdit'])->name('rekapEdit');
