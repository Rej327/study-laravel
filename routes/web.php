<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::middleware(['auth', 'user.type:user'])->group(function () {
        Route::get('/user/home', [UserController::class, 'index'])->name('user');
    });

    Route::middleware(['auth', 'user.type:user'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/dummies/create', [DashboardController::class, 'create'])->name('dummy.create');
        Route::post('/dashboard/dummies/create', [DashboardController::class, 'store'])->name('dummy.store');

        Route::get('/dashboard/show/{dummy}', [DashboardController::class, 'show'])->name('dummy.show');
        Route::get('/dashboard/dummies/{dummy}', [DashboardController::class, 'update'])->name('dummy.update');
        Route::put('/dashboard/dummies/{dummy}', [DashboardController::class, 'save'])->name('dummy.save');
        Route::delete('/dashboard/dummies/{dummy}', [DashboardController::class, 'destroy'])->name('dummy.destroy');

        Route::get('/photos/create', [PhotoController::class, 'create'])->name('photos.create');
        Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');
        Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');
        Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');
        

        // Route::resource('dashboard', DashboardController::class)->names([
        //     'index' => 'dashboard',
        //     'create' => 'dummy.create',
        //     'show' => 'dummy.show',
        //     'store' => 'dummy.store',
        //     'update' => 'dummy.update',
        //     'save' => 'dummy.save',
        //     'destroy' => 'dummy.destroy',
        // ]);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
