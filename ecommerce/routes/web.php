<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\configcontroller;
use App\Http\Controllers\bannercontroller;
use App\Http\Controllers\couponcontroller;
use App\Http\Controllers\contactcontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\cmscontroller;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/addcategory',[categorycontroller::class,'Add']);
Route::post('/senddata',[categorycontroller::class,'senddata']);
Route::get('/showcategory',[categorycontroller::class,'showdata']);
Route::get('/categorycontroller/delete/{id}',[categorycontroller::class,'delete']);
Route::get('/categorycontroller/edit/{id}',[categorycontroller::class,'edit']);
Route::post('/categorycontroller/update/{id}',[categorycontroller::class,'update']);

Route::get('/addconfig',[configcontroller::class,'Add']);
Route::post('/sendconfig',[configcontroller::class,'sendconfig']);
Route::get('/showconfig',[configcontroller::class,'showdata']);
Route::get('/configcontroller/delete/{id}',[configcontroller::class,'delete']);
Route::get('/configcontroller/edit/{id}',[configcontroller::class,'edit']);
Route::post('/configcontroller/update/{id}',[configcontroller::class,'update']);

Route::get('/addbanner',[bannercontroller::class,'Add']);
Route::post('/sendbanner',[bannercontroller::class,'sendbanner']);
Route::get('/showbanner',[bannercontroller::class,'showdata']);
Route::get('/bannercontroller/delete/{id}',[bannercontroller::class,'delete']);
Route::get('/bannercontroller/edit/{id}',[bannercontroller::class,'edit']);
Route::post('/bannercontroller/update/{id}',[bannercontroller::class,'update']);

Route::get('/addcoupon',[couponcontroller::class,'Add']);
Route::post('/sendcoupon',[couponcontroller::class,'sendcoupon']);
Route::get('/showcoupon',[couponcontroller::class,'showdata']);
Route::get('/couponcontroller/delete/{id}',[couponcontroller::class,'delete']);
Route::get('/couponcontroller/edit/{id}',[couponcontroller::class,'edit']);
Route::post('/couponcontroller/update/{id}',[couponcontroller::class,'update']);

Route::get('/addcontact',[contactcontroller::class,'Add']);
Route::post('/sendcontact',[contactcontroller::class,'sendcontact']);
Route::get('/showcontact',[contactcontroller::class,'showdata']);
Route::get('/contactcontroller/delete/{id}',[contactcontroller::class,'delete']);
Route::get('/contactcontroller/edit/{id}',[contactcontroller::class,'edit']);
Route::post('/contactcontroller/update/{id}',[contactcontroller::class,'update']);

Route::get('/addproduct',[productcontroller::class,'Add']);
Route::post('/sendproduct',[productcontroller::class,'sendproduct']);
Route::get('/showproduct',[productcontroller::class,'showdata']);
Route::get('/productcontroller/delete/{id}',[productcontroller::class,'delete']);
Route::get('/productcontroller/edit/{id}',[productcontroller::class,'edit']);
Route::post('/productcontroller/update/{id}',[productcontroller::class,'update']);

Route::get('/addcms',[cmscontroller::class,'Add']);
Route::post('/sendcms',[cmscontroller::class,'sendcms']);
Route::get('/showcms',[cmscontroller::class,'showdata']);
Route::get('/cmscontroller/delete/{id}',[cmscontroller::class,'delete']);
Route::get('/cmscontroller/edit/{id}',[cmscontroller::class,'edit']);
Route::post('/cmscontroller/update/{id}',[cmscontroller::class,'update']);



