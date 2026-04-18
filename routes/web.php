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
Route::get('/history', [PublicController::class, 'history'])->name('history');
Route::get('/service', [PublicController::class, 'service'])->name('service');
Route::get('/academic', [PublicController::class, 'academic'])->name('academic');
Route::get('/studentship', [PublicController::class, 'studentship'])->name('studentship');
Route::get('/ekstrakurikuler', [PublicController::class, 'ekstrakurikuler'])->name('ekstrakurikuler');
Route::get('/ekstrakurikuler/{id}', [PublicController::class, 'detailEkstrakurikuler'])
    ->name('ekstrakurikuler.detail');
Route::get('/gtk', [PublicController::class, 'gtk'])->name('gtk');
Route::get('/opening', [PublicController::class, 'opening'])->name('opening');
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