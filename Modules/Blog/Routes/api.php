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

// Admin Related Routes

Route::middleware(['auth:sanctum'])->prefix('admin/')->name('admin.')->group(function(){
    // Admin Manage Articles
    Route::resource('/article', Admin\ArticleController::class)->only('store', 'update', 'destroy');

    // Admin Manage Categories
    Route::resource('/categories', Admin\CategoryController::class)->only('store', 'update', 'destroy');

    // Admin Manage Tags
    Route::resource('/tags', Admin\TagController::class)->only('store', 'update', 'destroy');

});

// Blog
Route::get('/articles', [BlogController::class, 'showAllArticles']);
Route::get('/articles/{article:slug}', [BlogController::class, 'getArticle']);
Route::get("/getSpecialArticles", [BlogController::class, 'getSpecialArticles']);

// Category
Route::get('/categories', [BlogController::class, 'getAllCategories']);
Route::get('/articles/category/{article:slug}', [BlogController::class, 'getArticleCategory']);
Route::get('/categories/{category:name}', [BlogController::class, 'getCategoryArticles']);

// Tag
Route::get('/tags', [BlogController::class, 'getAllTags']);
Route::get('/articles/tags/{article:slug}', [BlogController::class, 'getArticleTags']);
Route::get('/tags/{tag:name}', [BlogController::class, 'getTagArticles']);


Route::middleware('auth:api')->get('/testing', function (Request $request) {
    return $request->user();
});