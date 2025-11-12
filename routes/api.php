<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\ToDoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'lists', 'as' => 'lists.'], function () {
    Route::get('/', [ToDoController::class, 'getList'])->name('get');
    Route::post('/', [ToDoController::class, 'storeList'])->name('store');
    Route::put('/{list}', [ToDoController::class, 'updateList'])->name('store');
    Route::delete('/{list}', [ToDoController::class, 'deleteList'])->name('store');
});

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::patch('/update/{user}', [ProfileController::class, 'update'])->name('update');
    Route::get('/get/{user}', [ProfileController::class, 'index'])->name('index');
});
