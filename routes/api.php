<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccessoryPartController;
use App\Http\Controllers\SparePartController;
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

#region user
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    // Accessory Part Api's
    Route::get('/getAccessoryParts', [AccessoryPartController::class, 'getAccessoryParts']);
    Route::post('/storeAccessoryPart', [AccessoryPartController::class, 'storeAccessoryPart']);
    Route::post('/accessoryPart/searchByName', [AccessoryPartController::class, 'searchByName']);

    // User Api's
    Route::post('/updateProfile', [UserController::class, 'updateProfile']);

    // Car Api's
    Route::get('/indexCars', [CarController::class, 'index']);
    Route::post('/car/sortByPrice', [CarController::class, 'sortByPrice']);
    Route::post('/car/sortByYear', [CarController::class, 'sortByYear']);
    Route::post('/searchByName', [CarController::class, 'searchBYName']);
    Route::post('/searchByColor', [CarController::class, 'searchBYColor']);
    Route::post('/searchByBrand', [CarController::class, 'searchBYBrand']);

    // SparePart Api's
    Route::get('/indexSpareparts', [SparePartController::class, 'index']);
    Route::post('/sparePart/searchByName', [SparePartController::class, 'searchBYName']);

    // Order Api's
    Route::post('/order/store', [OrderController::class, 'store']);
});
#end region user


#region admin
Route::prefix('admin')->group(function () {
    Route::post('/login', [AuthController::class, 'loginAdmin']);
});
#end region admin
