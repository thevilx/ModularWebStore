<?php

use Illuminate\Http\Request;
use Modules\Store\Http\Controllers\ProductController;

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

Route::get('/product/{ProductBundle}' , [ProductController::class , 'showProduct']);

// Route::middleware('auth:api')->get('/store', function (Request $request) {
//     return $request->user();
// });