<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\RoomservicesController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\RoomreviewController;
use App\Http\Controllers\Admin\BookingController;



use App\Http\Controllers\admin\bannerController;

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

Route::group(['as' => 'admin.'], function() {

	Route::group(['middleware' => 'auth:admin'], function() {

		Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
		Route::get('/', [HomeController::class, 'index'])->name('home');
            Route::get('/homepage/banner',[bannerController::Class,'index']);

Route::post('/banner/save',[bannerController::Class,'bannersave']);


Route::view('/profile','admin.profile');

		Route::view('/dashboard','admin.dashboard');
        


Route::get('/category',[CategoryController::Class,'index']);
Route::get('/manage_category',[CategoryController::Class,'manage_category']);
Route::get('/manage_category/{id}',[CategoryController::Class,'manage_category']);
Route::post('/manage_category_process',[CategoryController::Class,'manage_category_process']);
Route::get('/category/status/{status}/{id}',[CategoryController::Class,'status']);
Route::get('/category/delete/{id}',[CategoryController::Class,'delete']);


Route::get('/roomservices',[roomservicesController::Class,'index']);
Route::get('/manage_roomservices',[roomservicesController::Class,'manage_roomservices']);
Route::get('/manage_roomservices/{id}',[roomservicesController::Class,'manage_roomservices']);
Route::post('/manage_roomservices_process',[roomservicesController::Class,'manage_roomservices_process']);
Route::get('/roomservices/status/{status}/{id}',[roomservicesController::Class,'status']);
Route::get('/roomservices/delete/{id}',[roomservicesController::Class,'delete']);

Route::get('/room',[roomController::Class,'index']);
Route::get('/manage_room',[roomController::Class,'manage_room']);
Route::get('/manage_room/{id}',[roomController::Class,'manage_room']);
Route::post('/manage_room_process',[roomController::Class,'manage_room_process']);
Route::get('/room/status/{status}/{id}',[roomController::Class,'status']);
Route::get('/room/delete/{id}',[roomController::Class,'delete']);

Route::get('/reviews',[RoomreviewController::Class,'index']);
Route::get('/manage_reviews',[RoomreviewController::Class,'manage_reviews']);
Route::get('/manage_reviews/{id}',[RoomreviewController::Class,'manage_reviews']);
Route::post('/manage_reviews_process',[RoomreviewController::Class,'manage_reviews_process']);
Route::get('/reviews/status/{status}/{id}',[RoomreviewController::Class,'status']);
Route::get('/reviews/delete/{id}',[RoomreviewController::Class,'delete']);


Route::get('/room/assign',[BookingController::Class,'userslist']);

	});

	Route::group(['middleware' => 'guest:admin'], function() {

		Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
		Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');

	});

});
