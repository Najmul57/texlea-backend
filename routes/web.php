<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//frontend


//dashboard
Route::get('/admin/panel', function () {
    return view('backend.layout.index');
})->middleware(['auth', 'verified'])->name('admin.panel');

//admin controller
Route::prefix('admin')->group(function () {

    //slider
    Route::prefix('slider')->group(function () { // Change here
        Route::get('/list', [SliderController::class, 'index'])->name('slider.index');
        Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
        Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::post('/update/{id}', [SliderController::class, 'update'])->name('slider.update');
        Route::get('/destroy/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
    });
    //slider
    Route::prefix('feature')->group(function () { // Change here
        Route::get('/list', [FeatureController::class, 'index'])->name('feature.index');
        Route::get('/create', [FeatureController::class, 'create'])->name('feature.create');
        Route::post('/store', [FeatureController::class, 'store'])->name('feature.store');
        Route::get('/edit/{id}', [FeatureController::class, 'edit'])->name('feature.edit');
        Route::post('/update/{id}', [FeatureController::class, 'update'])->name('feature.update');
        Route::get('/destroy/{id}', [FeatureController::class, 'destroy'])->name('feature.destroy');
    });
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
