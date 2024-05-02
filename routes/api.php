<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccessoryPartController;
use App\Http\Controllers\SparePartController ;
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
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/update/{id}', [UserController::class, 'update']);
    Route::get('/index_cars', [CarController::class, 'index']);
    Route::get('/index_accessoryparts', [AccessoryPartController::class, 'index']);
    Route::get('/index_spareparts', [SparePartController::class, 'index']);
    Route::post('/searchBYName', [CarController::class, 'searchBYName']);
    Route::post('/searchBYColor', [CarController::class, 'searchBYColor']);
    Route::post('/searchBYBrand', [CarController::class, 'searchBYBrand']);
    Route::post('/AccessoryPart/searchBYName', [AccessoryPartController::class, 'searchBYName']);
    Route::post('/SparePart/searchBYName', [SparePartController::class, 'searchBYName']);
});

#admin user
Route::post('/register', [AuthController::class, 'register']);
#login
Route::post('/login', [AuthController::class, 'login']);



#region admin
// Route::prefix('admin')->group(function () {
//     Route::post('/login', [AuthController::class, 'loginAdmin']);
// });
#end region admin
