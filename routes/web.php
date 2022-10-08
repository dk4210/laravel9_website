<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;

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

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
  return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin All route
Route::controller(AdminController::class)->group(function() {
Route::get('admin/logout', 'Destroy')->name('admin.logout');
Route::get('admin/profile', 'Profile')->name('admin.profile');
Route::get('edit/profile', 'EditProfile')->name('edit.profile');
Route::post('store/profile', 'StoreProfile')->name('store.profile');
Route::get('change/password', 'ChangePassword')->name('change.password');
Route::post('update/password', 'UpdatePassword')->name('update.password');
});

// Home slide Routes
Route::controller(HomeSliderController::class)->group(function() {
    Route::get('home/slide', 'index')->name('home.slide');
    Route::post('update/slider', 'store')->name('update.slider');
});

// About Routes
Route::controller(AboutController::class)->group(function() {
    Route::get('about/page', 'AboutPage')->name('about.page');
    Route::post('update/about', 'Store')->name('update.about');
    Route::get('about', 'HomeAbout')->name('home.about');
    Route::get('about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    Route::post('store/multi/image', 'StoreMultiImage')->name('store.multi.image');
    Route::get('all/multi/image', 'AllMultiImage')->name('all.multi.image');
    Route::get('edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
    Route::post('update/multi/image', 'UpdateMultiImage')->name('update.multi.image');
    Route::get('delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');
});

// Portfolio All Routes
Route::controller(PortfolioController::class)->group(function() {
    Route::get('all/portfolio', 'index')->name('all.portfolio');
    Route::get('add/portfolio', 'create')->name('add.portfolio');
    Route::post('store/portfolio', 'store')->name('store.portfolio');
    Route::get('edit/portfolio/{id}', 'edit')->name('edit.portfolio');
    Route::post('update/portfolio', 'update')->name('update.portfolio');
    Route::get('delete/portfolio/{id}', 'destroy')->name('delete.portfolio');
    Route::get('portfolio/details/{id}', 'portfolioDetails')->name('portfolio.details');

});

// Blog Category All Routes
Route::controller(BlogCategoryController::class)->group(function() {
    Route::get('all/blog/category', 'index')->name('all.blog.category');
    Route::get('add/blog/category', 'create')->name('add.blog.category');
    Route::post('store/blog/category', 'store')->name('store.blog.category');
    Route::get('edit/blog/category/{id}', 'edit')->name('edit.blog.category');
    Route::post('update/blog/category/{id}', 'update')->name('update.blog.category');
    Route::get('delete/blog/category/{id}', 'destroy')->name('delete.blog.category');
});


// Blog All Routes
Route::controller(BlogController::class)->group(function() {
      Route::get('all/blog', 'index')->name('all.blog');
      Route::get('add/blog', 'create')->name('add.blog');
      Route::post('store/blog', 'store')->name('store.blog');
      Route::get('edit/blog/{id}', 'edit')->name('edit.blog');
//    Route::post('update/blog/category/{id}', 'update')->name('update.blog.category');
//    Route::get('delete/blog/category/{id}', 'destroy')->name('delete.blog.category');
});





require __DIR__.'/auth.php';
