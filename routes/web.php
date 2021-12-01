<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});


Route::view('admin/dashboard','admin.dashboard');

Route::get('admin/homepage/banner',[bannerController::Class,'index']);

Route::post('admin/banner/save',[bannerController::Class,'bannersave']);

Route::view('admin/profile','admin.profile');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/My-Account', [HomeController::Class, 'index']);

///////////////////
