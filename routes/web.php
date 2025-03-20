<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Models\Brand;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"])->name('main-page');
Route::get('/articles/brand/{brandId}', [HomeController::class, 'getArticlesByCategory']);
// Route::get('/brand/{category}', [HomeController::class, "index"])->name('brandsByCategory');

// Route::get('/product/{slug}', [ProductController::class, "show"])->name('product.show');
Route::get('/', [HomeController::class, 'index'])->name('articles.index');
Route::get('/brand/{brandId}', [ProductController::class, 'getArticlesByCategory'])->name('articles.getByCategory');
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
