<?php

use Illuminate\Support\Facades\Route;

// For this test, I will be using apiResources instead of middleware to authenticate create, update, and delete requests with auth:sanctum.
// For a real project, its better to use authentication middleware.
//Route::middleware('auth:sanctum')->group(function () {
//    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
//    Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
//    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
//});
//Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
//Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');

Route::apiResource('recipes', 'RecipeController');
