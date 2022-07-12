<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
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

//Admin All Route
Route::controller(AdminController::class)->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/profile','Profile')->name('admin.profile');
    Route::get('/edit/profile','EditProfile')->name('edit.profile');
    Route::post('/store/profile','StoreProfile')->name('store.profile');
    Route::get('/change/password','ChangePassword')->name('change.password');
    Route::post('/updates/password','UpdatePassword')->name('update.password');
});
//Home Slide All Route
Route::controller(HomeSliderController::class)->group(function (){
    Route::get('/home/slide','HomeSLider')->name('home.slider');
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth','verified','isAdmin'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/',function (){
   return view('frontend.index');
});

