<?php

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;

// Admin Manage Articles
Route::resource('/article', ArticleController::class)->only('store' , 'update' , 'destroy');

// Admin Manage Categories
Route::resource('/categories', CategoryController::class)->only('store', 'update', 'destroy');

// Admin Manage Tags
Route::resource('/tags', TagController::class)->only('store', 'update', 'destroy');
