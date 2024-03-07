<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenerbitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/pengadaan', [DashboardController::class, 'index1'])->middleware(['auth', 'verified'])->name('pengadaan');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [BukuController::class, 'index'])->middleware(['auth'])->name('buku');
    Route::get('/admin/create', [BukuController::class, 'create'])->name('create');
    Route::post('/admin/store', [BukuController::class, 'store'])->name('store');
    Route::get('/admin/edit/{id}', [BukuController::class, 'edit'])->name('edit');
    Route::delete('/admin/hapus/{id}', [BukuController::class, 'destroy'])->name('destroy');
    Route::put('/admin/edit/{id}', [BukuController::class, 'update'])->name('update');

    Route::resource('penerbit', PenerbitController::class);
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
