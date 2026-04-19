<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdministratorController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\EkskulController;
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
Route::get('/ekskul', [PublicController::class, 'ekskul'])->name('ekskul');
Route::get('/ekskul/{id}', [PublicController::class, 'detailEkskul'])
    ->name('ekskul.detail');
Route::get('/gtk', [PublicController::class, 'gtk'])->name('gtk');
Route::get('/opening', [PublicController::class, 'opening'])->name('opening');
Route::get('/sarana', [PublicController::class, 'sarana'])->name('sarana');
Route::get('/sarana_detail', [PublicController::class, 'saranaDetail'])->name('sarana_detail');
Route::get('/spmb', [PublicController::class, 'spmb'])->name('spmb');
Route::get('/achievment', [PublicController::class, 'achievment'])->name('achievment');
Route::get('/alumni', [PublicController::class, 'alumni'])->name('alumni');
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

        Route::resource('administrators', AdministratorController::class)->names([
            'index' => 'administrators.index',
            'create' => 'administrators.create',
            'store' => 'administrators.store',
            'edit' => 'administrators.edit',
            'update' => 'administrators.update',
            'destroy' => 'administrators.destroy',
        ]);
        Route::get('administrators/search', [AdministratorController::class, 'search'])->name('administrators.search');

        Route::resource('ekskuls', EkskulController::class)->names([
            'index' => 'ekskuls.index',
            'create' => 'ekskuls.create',
            'store' => 'ekskuls.store',
            'edit' => 'ekskuls.edit',
            'update' => 'ekskuls.update',
            'destroy' => 'ekskuls.destroy',
        ]);
        Route::get('ekskuls-search', [EkskulController::class, 'search'])->name('ekskuls.search');

        Route::resource('carousels', \App\Http\Controllers\Admin\CarouselController::class);
        Route::get('carousels-search', [\App\Http\Controllers\Admin\CarouselController::class, 'search'])
            ->name('carousels.search');
    });
});

require __DIR__.'/auth.php';