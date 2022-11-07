<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PlantController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// get CSRF token
Route::get('/token', [ItemController::class, 'showToken']);

// Item Routes
Route::get('/items',[ItemController::class, 'index']);
Route::prefix('/item')->group( function () {
    Route::post('/store', [ItemController::class, 'store']);
    Route::get('/{id}', [ItemController::class, 'show']);
    Route::put('/{id}', [ItemController::class, 'update']);
    Route::delete('/{id}', [ItemController::class, 'destroy']);
    }
);

// Plant Routes
Route::get('/plants', [PlantController::class, 'index']);
Route::prefix('/plant')->group( function () {
    Route::post('/store', [PlantController::class, 'store']);
    Route::put('/{id}', [PlantController::class, 'update']);
    Route::delete('/{id}', [PlantController::class, 'destroy']);
    }
);
 