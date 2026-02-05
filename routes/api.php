<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ContactController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Public API Routes
Route::prefix('v1')->group(function () {
    // Portfolio API
    Route::get('/portfolios', [PortfolioController::class, 'index']);
    Route::get('/portfolios/categories', [PortfolioController::class, 'categories']);
    Route::get('/portfolios/{id}', [PortfolioController::class, 'show']);
    
    // Blog API
    Route::get('/blogs', [BlogController::class, 'index']);
    Route::get('/blogs/featured', [BlogController::class, 'featured']);
    Route::get('/blogs/categories', [BlogController::class, 'categories']);
    Route::get('/blogs/{slug}', [BlogController::class, 'show']);
    
    // Contact API
    Route::post('/contact', [ContactController::class, 'store']);
});
