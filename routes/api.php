<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Blog\CategoryController;

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

Route::middleware(['auth:sanctum' , 'can:article.create'])->get('/user', function (Request $request) {
    return $request->user();
});



// Phone
Route::post('/sendSmsTo' , [PhoneController::class , 'sendSmsTo']);
Route::post('/validatePhone' , [PhoneController::class , 'validatePhone']);

// Profile
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/updateProfile' , [ProfileController::class , 'updateProfile']);
});

