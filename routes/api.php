<?php

use App\Http\Controllers\{
    ArticleController,
    BrandController,
    CategoryController,
    DocumentController,
    MeasureController
};
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

Route::any('/search/measures',  [MeasureController::class, 'search']);

Route::apiResource(
    '/categories',
    CategoryController::class
);

Route::apiResource(
    '/articles',
    ArticleController::class
);

Route::apiResource(
    '/documents',
    DocumentController::class
);
