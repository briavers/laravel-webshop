<?php

use App\Http\Controllers\Development\PdfController;
use App\Http\Controllers\Web\LanguageController;
use App\Http\Controllers\Web\Pages\HomeController;
use App\Http\Controllers\Web\Product\IndexController as ProductIndex;
use App\Http\Controllers\Web\Product\ShowController as ProductShow;
use App\Http\Controllers\Web\User\IndexController as UserIndex;
use App\Http\Livewire\Cart\Index as CartIndex;
use App\Http\Livewire\Category\Index as CategoryIndex;
use App\Http\Livewire\Order\Complete;
use App\Http\Livewire\Order\Create as OrderCreate;
use App\Http\Livewire\Order\Index as OrderIndex;
use App\Http\Livewire\Product\Create as ProductCreate;
use App\Http\Livewire\Product\Edit as ProductEdit;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('index');
Route::get('lang/{lang}', LanguageController::class)->name('lang.switch');

Route::prefix('products')->group(function () {
    Route::get('/', ProductIndex::class)->name('product.index');
    Route::get('/{product}', ProductShow::class)->name('product.show');
});

Route::prefix('order')->group(function () {
    Route::get('/create', OrderCreate::class)->name('order.create');
    Route::get('/complete/{order}', Complete::class)->name('order.complete');
});

Route::prefix('category')->group(function () {
    Route::get('/{slug}', ProductIndex::class)->name('category.products');
});


Route::prefix('cart')->group(function () {
    Route::get('/', CartIndex::class)->name('cart.index');
});

Route::middleware(['auth.admin', 'verified'])->prefix('/admin')->group(
    function () {
        Route::get('/users', UserIndex::class)->name('admin.users.index');
        Route::get('/product/new', ProductCreate::class)->name('product.create');
        Route::get('/product/{product}/edit', ProductEdit::class)->name('product.edit');
        Route::get('/categories', CategoryIndex::class)->name('admin.categories.index');
        Route::get('/pdf', PdfController::class);

    }
);
Route::middleware(['auth', 'verified'])->group(
    function () {
        Route::get('/orders', OrderIndex::class)->name('order.index');
    }
);
