<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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


Route::get('/', [PagesController::class, 'index'])->name('general.home');
Route::get('/product', [PagesController::class, 'product'])->name('general.product');
Route::get('/product-detail/{product:slug}', [PagesController::class, 'productDetail'])->name('general.product-detail');
Route::get('/product/load', [PagesController::class, 'loadMoreProduct'])->name('general.product.load');
Route::get('/about-us', [PagesController::class, 'aboutUs'])->name('general.about-us');
Route::get('/news', [PagesController::class, 'news'])->name('general.news');
Route::get('/contact-us', [PagesController::class, 'contactUs'])->name('general.contact-us');
Route::get('/our-service', [PagesController::class, 'ourService'])->name('general.our-service');
Route::post('contact-us', [PagesController::class, 'sendContactUs'])->name('general.contact-us.send');
Route::post('contact-us-popup', [PagesController::class, 'sendContactUsPopUp'])->name('general.contact-us.send.popup');
Route::get('/sitemap.xml', [PagesController::class, 'sitemap'])->name('sitemap');


Route::middleware('auth')->prefix('04c14af7709150a20c8c327a9e2628f43fe039be')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('/edit/{product:slug}', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/update/{product:slug}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/delete/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::get('/show/{product:slug}', [ProductController::class, 'show'])->name('products.show');
    });

    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);

    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
