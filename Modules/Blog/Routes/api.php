<?php

use Illuminate\Http\Request;
use Modules\Blog\Http\Controllers\BlogController;

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

Route::get('/test' , function (){
    return response()->json(['test' => "its a test"]);
});

// Blog
Route::get('/articles', [BlogController::class, 'showAllArticles']);
Route::get('/articles/{article:slug}', [BlogController::class, 'getArticle']);
Route::get("/getSpecialArticles", [BlogController::class, 'getSpecialArticles']);

// Category
Route::get('/categories', [BlogController::class, 'getAllCategories']);
Route::get('/articles/category/{article}', [BlogController::class, 'getArticleCategory']);
Route::get('/categories/{category}', [BlogController::class, 'getCategoryArticles']);

// Tag
Route::get('/tags', [BlogController::class, 'getAllTags']);
Route::get('/articles/tag/{article}', [BlogController::class, 'getArticleTags']);
Route::get('/tags/{tag}', [BlogController::class, 'getTagArticles']);



Route::middleware('auth:api')->get('/testing', function (Request $request) {
    return $request->user();
});