<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\ExtracurricularController;
use App\Http\Controllers\Admin\SchoolProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Redirect halaman depan ke login atau ke dashboard admin
Route::get('/', [PublicController::class, 'home'])->name('home');
// Route::get('/profile', [PublicController::class, 'profile'])->name('public.profile');
Route::get('/profil', [PublicController::class, 'profile'])->name('profile');
Route::get('/ekstrakurikuler', [PublicController::class, 'ekstrakurikuler'])->name('public.ekstrakurikuler');
// Route::get('/', function () {
//     return redirect()->route('admin');
// });

Route::middleware('auth')->group(function () {
    
    // Profile Routes (Bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Group Admin
    Route::prefix('admin')->group(function () {
        // Dashboard Utama - Sekarang namanya 'admin'
        Route::get('admin', [AdminController::class, 'index'])->name('admin');
        
        // Resource User (Otomatis punya nama route user.index, user.create, dll)
        Route::resource('users', UserController::class)->names([
            'index' => 'users.index',
            'create' => 'users.create',
            'store' => 'users.store',
            'edit' => 'users.edit',
            'update' => 'users.update',
            'destroy' => 'users.destroy',
        ]);
        Route::get('/admin/users/search', [UserController::class, 'search'])->name('users.search');

        Route::get('/school-profile', [SchoolProfileController::class, 'index'])->name('school.profile');
        Route::post('/school-profile', [SchoolProfileController::class, 'update'])->name('school.profile.update');

        Route::resource('extras', ExtracurricularController::class)->names([
            'index' => 'extras.index',
            'create' => 'extras.create',
            'store' => 'extras.store',
            'edit' => 'extras.edit',
            'update' => 'extras.update',
            'destroy' => 'extras.destroy',
        ]);
        Route::get('extras-search', [ExtracurricularController::class, 'search'])->name('extras.search');

        Route::resource('carousels', \App\Http\Controllers\Admin\CarouselController::class);
        Route::get('carousels-search', [\App\Http\Controllers\Admin\CarouselController::class, 'search'])
            ->name('carousels.search');
    });
});

require __DIR__.'/auth.php';