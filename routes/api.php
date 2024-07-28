<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubcategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResources([
        'categories' => CategoriesController::class,
        'category/{category}/subcategories' => SubcategoriesController::class,
    ]);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
