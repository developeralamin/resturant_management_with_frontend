<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

//Frontend Login System
Route::post('/reservation', [App\Http\Controllers\ReservationController::class, 'reserve'])->name('reservation.reserve');

Route::post('/contact', [App\Http\Controllers\ContactConrller::class, 'frontend'])->name('frontend.index');



//Admin Login System
Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){

   Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

   Route::resource('slider', App\Http\Controllers\Admin\SliderController::class);
   Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
   Route::resource('items', App\Http\Controllers\Admin\ItemController::class);

   Route::get('reservation', [App\Http\Controllers\Admin\ReservationController::class, 'index'])->name('reservation.index');

   Route::post('reservation/{id}', [App\Http\Controllers\Admin\ReservationController::class, 'status'])->name('reservation.status');

    Route::delete('reservation/{id}', [App\Http\Controllers\Admin\ReservationController::class, 'destroy'])->name('reservation.destroy');


   Route::get('contact', [App\Http\Controllers\Admin\ContactController::class, 'contact_backend'])->name('contact.index');;

   Route::get('contact/{id}', [App\Http\Controllers\Admin\ContactController::class, 'show'])->name('contact.show');

 Route::delete('contact/{id}', [App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('contact.destroy');
});

