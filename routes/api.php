<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MeasureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource(
    '/brands',
    BrandController::class
);

Route::apiResource(
    '/measures',
    MeasureController::class
);

Route::apiResource(
    '/categories',
    CategoryController::class
);

Route::apiResource(
    '/articles',
    ArticleController::class
);
