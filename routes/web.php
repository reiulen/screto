<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::middleware(['home'])->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
});
Route::post('kirim/{user:id}', [IndexController::class, 'kirim'])->name('kirim');
Route::post('hapus/{komentar:id}', [IndexController::class, 'destroy'])->name('hapus');
Route::post('buat', [IndexController::class, 'buat'])->name('buat');
Route::get('pertanyaan/{user:id}', [IndexController::class, 'pertanyaan'])->name(('pertanyaan'));
