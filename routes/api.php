<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\MenuCategoryController;
use App\Http\Controllers\Api\FriendController;
use App\Http\Controllers\Api\OrderController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('users')->group(function() {
        Route::get('me', [AuthController::class, 'me']);
    });

    Route::prefix('friends')->group(function() {
        Route::get('', [FriendController::class, 'index']);
        Route::post('', [FriendController::class, 'store']);
    });
    Route::prefix('menus')->group(function() {
        Route::get('', [MenuController::class, 'index']);
    });
    Route::prefix('menu_categories')->group(function() {
        Route::get('', [MenuCategoryController::class, 'index']);
    });
    Route::prefix('orders')->group(function() {
        Route::get('', [OrderController::class, 'index']);
        Route::post('', [OrderController::class, 'store']);
    });
});
