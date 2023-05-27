<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\Api\Admin\MenuController;
use App\Http\Controllers\Api\Admin\MenuCategoryController;

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

Route::middleware(['auth:sanctum', 'abilities:'.\App\Enums\SanctumAbility::Admin])->group(function () {
    Route::prefix('users')->group(function() {
        Route::get('me', [AuthController::class, 'me']);
    });

    Route::prefix('menus')->group(function() {
        Route::get('', [MenuController::class, 'index']);
        Route::get('{id}', [MenuController::class, 'show']);
        Route::post('', [MenuController::class, 'store']);
        Route::put('{id}', [MenuController::class, 'update']);
        Route::delete('{id}', [MenuController::class, 'delete']);
    });

    Route::prefix('menu_categories')->group(function() {
        Route::get('', [MenuCategoryController::class, 'index']);
        Route::get('{id}', [MenuCategoryController::class, 'show']);
        Route::post('', [MenuCategoryController::class, 'store']);
        Route::put('{id}', [MenuCategoryController::class, 'update']);
        Route::delete('{id}', [MenuCategoryController::class, 'delete']);
    });
});
