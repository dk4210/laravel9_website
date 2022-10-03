<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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


require __DIR__.'/auth.php';
