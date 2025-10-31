<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BooksController;

// Route public (bisa diakses tanpa login)
Route::get('/welcome', function () {
    return view('index');
})->name('welcome');

Route::get('/login', [LoginController::class, 'view'])->name('login.view');
Route::post('/login', [LoginController::class, 'aksi'])->name('login');

Route::get('/register', [RegisterController::class, 'view'])->name('register.view');
Route::post('/register', [RegisterController::class, 'aksi'])->name('register');

// Route yang butuh login (semua user yang login)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('dashboard');
    })->name('home');

    Route::get('/buku', [BooksController::class, 'buku'])->name('buku');
});

// Route khusus admin (harus login DAN role = admin)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [BooksController::class, 'admin'])->name('admin');
    Route::post('/admin/store', [BooksController::class, 'store'])->name('admin.store');

    Route::get('/admin/{id}/update', [BooksController::class, 'updatebook'])->name('admin.update.view');
    Route::post('/admin/{id}/update', [BooksController::class, 'update'])->name('admin.update');

    Route::delete('/admin/{id}/delete', [BooksController::class, 'destroy'])->name('admin.delete');
});

// Route yang butuh login (semua user yang login)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('dashboard');
    })->name('home');

    Route::get('/buku', [BooksController::class, 'buku'])->name('buku');

    // ✅ Tambahkan route logout di sini
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
