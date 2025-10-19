<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MidtransController;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');
    Route::post('/menu/cek', [MenuController::class, 'cekKetersediaan'])->name('menu.cek');
    Route::post('/menu/bayar', [MenuController::class, 'bayar'])->name('menu.bayar');
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/midtrans/callback', [MidtransController::class, 'callback']);
    Route::post('/menu/confirm', [MenuController::class, 'confirm'])->name('menu.confirm');


});

require __DIR__ . '/auth.php';
