<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\GlobalLocationController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

//frontend
Route::get('/',[FrontendController::class, 'slider'])->name('home.slider');

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
    //feature
    Route::prefix('feature')->group(function () { // Change here
        Route::get('/list', [FeatureController::class, 'index'])->name('feature.index');
        Route::get('/create', [FeatureController::class, 'create'])->name('feature.create');
        Route::post('/store', [FeatureController::class, 'store'])->name('feature.store');
        Route::get('/edit/{id}', [FeatureController::class, 'edit'])->name('feature.edit');
        Route::post('/update/{id}', [FeatureController::class, 'update'])->name('feature.update');
        Route::get('/destroy/{id}', [FeatureController::class, 'destroy'])->name('feature.destroy');
    });
    //certificate
    Route::prefix('certificate')->group(function () { // Change here
        Route::get('/list', [CertificateController::class, 'index'])->name('certificate.index');
        Route::get('/create', [CertificateController::class, 'create'])->name('certificate.create');
        Route::post('/store', [CertificateController::class, 'store'])->name('certificate.store');
        Route::get('/edit/{id}', [CertificateController::class, 'edit'])->name('certificate.edit');
        Route::post('/update/{id}', [CertificateController::class, 'update'])->name('certificate.update');
        Route::get('/destroy/{id}', [CertificateController::class, 'destroy'])->name('certificate.destroy');
    });
    //country
    Route::prefix('country')->group(function () { // Change here
        Route::get('/list', [CountryController::class, 'index'])->name('country.index');
        Route::get('/create', [CountryController::class, 'create'])->name('country.create');
        Route::post('/store', [CountryController::class, 'store'])->name('country.store');
        Route::get('/edit/{id}', [CountryController::class, 'edit'])->name('country.edit');
        Route::post('/update/{id}', [CountryController::class, 'update'])->name('country.update');
        Route::get('/destroy/{id}', [CountryController::class, 'destroy'])->name('country.destroy');
    });
    //global location
    Route::prefix('global-location')->group(function () { // Change here
        Route::get('/list', [GlobalLocationController::class, 'index'])->name('global_location.index');
        Route::get('/create', [GlobalLocationController::class, 'create'])->name('global_location.create');
        Route::post('/store', [GlobalLocationController::class, 'store'])->name('global_location.store');
        Route::get('/edit/{id}', [GlobalLocationController::class, 'edit'])->name('global_location.edit');
        Route::post('/update/{id}', [GlobalLocationController::class, 'update'])->name('global_location.update');
        Route::get('/destroy/{id}', [GlobalLocationController::class, 'destroy'])->name('global_location.destroy');
    });
    //category
    Route::prefix('category')->group(function () { // Change here
        Route::get('/list', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    //subcategory
    Route::prefix('subcategory')->group(function () { // Change here
        Route::get('/list', [SubCategoryController::class, 'index'])->name('subcategory.index');
        Route::get('/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
        Route::post('/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
        Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
        Route::post('/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
        Route::get('/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');
    });
    //childcategory
    Route::prefix('childcategory')->group(function () { // Change here
        Route::get('/list', [ChildCategoryController::class, 'index'])->name('childcategory.index');
        Route::get('/create', [ChildCategoryController::class, 'create'])->name('childcategory.create');
        Route::post('/store', [ChildCategoryController::class, 'store'])->name('childcategory.store');
        Route::get('/edit/{id}', [ChildCategoryController::class, 'edit'])->name('childcategory.edit');
        Route::post('/update/{id}', [ChildCategoryController::class, 'update'])->name('childcategory.update');
        Route::get('/destroy/{id}', [ChildCategoryController::class, 'destroy'])->name('childcategory.destroy');

        Route::get('/get-subcategories/{category_id}', [ChildCategoryController::class, 'getSubcategories'])->name('get.subcategories');
       
    });

    //about
    Route::get('about', [AboutController::class, 'about'])->name('about.page');
    Route::post('about/update/{id}', [AboutController::class, 'update'])->name('about.update');

    //setting
    Route::get('setting', [SettingController::class, 'setting'])->name('setting.page');
    Route::post('setting/update/{id}', [SettingController::class, 'update'])->name('setting.update');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
