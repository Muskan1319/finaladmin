<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\contactcontroller;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\bannercontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\cmscontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\couponcontroller;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'middleware' => 'api',
    

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/userprofile', [AuthController::class, 'userProfile']);
    Route::get('/changeprofile', [AuthController::class, 'updateprofile']);

       
});
Route::post('/sendcontact', [contactcontroller::class, 'sendcontact']);
Route::get('/showcat', [categorycontroller::class, 'showcat']);
Route::get('/showban', [bannercontroller::class, 'showban']);
Route::get('/showpro', [productcontroller::class, 'showpro']);
Route::get('/showcmsm', [cmscontroller::class, 'showcmsm']);
Route::get('/productid/{id}', [productcontroller::class, 'sendid']);
Route::post('/adduserdetail', [usercontroller::class, 'adduserdetails']);
Route::post('/adduserorders', [usercontroller::class, 'adduserorder']);
Route::post('/applycoupon',[couponcontroller::class,'applycoupon']);
Route::get('/cmsid', [cmscontroller::class, 'Cms']);


