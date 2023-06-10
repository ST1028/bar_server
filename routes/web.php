<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuCategoryController;
use App\Http\Controllers\Admin\FriendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('menus')->group(function() {
    Route::get('', [MenuController::class, 'index'])->name('menu.index');
    Route::get('detail/{id}', [MenuController::class, 'show'])->name('menu.show');
    Route::get('create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('create', [MenuController::class, 'store'])->name('menu.store');
    Route::post('{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('{id}', [MenuController::class, 'delete'])->name('menu.delete');
});

Route::prefix('menu_categories')->group(function() {
    Route::get('', [MenuCategoryController::class, 'index']);
    Route::get('{id}', [MenuCategoryController::class, 'show']);
    Route::post('', [MenuCategoryController::class, 'store']);
    Route::post('{id}', [MenuCategoryController::class, 'update']);
    Route::delete('{id}', [MenuCategoryController::class, 'delete']);
});

Route::prefix('friends')->group(function() {
    Route::get('', [FriendController::class, 'index'])->name('friend.index');
    Route::post('all/disabled', [FriendController::class, 'batchUpdate'])->name('friend.all.disabled');
});
