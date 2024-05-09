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
    Route::get('/getCars', [CarController::class, 'getCars']);
    Route::post('/sortByPrice', [CarController::class, 'sortByPrice']);
    Route::post('/sortByYear', [CarController::class, 'sortByYear']);
    Route::post('/searchByName', [CarController::class, 'searchByName']);
    Route::post('/searchByColor', [CarController::class, 'searchByColor']);
    Route::post('/searchByBrand', [CarController::class, 'searchByBrand']);

    // SparePart Api's
    Route::get('/getSpareParts', [SparePartController::class, 'getSpareParts']);
    Route::post('searchByNameSparePart', [SparePartController::class, 'searchByNameSparePart']);

    // Order Api's
    Route::post('addOrder', [OrderController::class, 'addOrder']);
});
#end region user


#region admin
Route::prefix('admin')->group(function () {
    Route::post('/login', [AuthController::class, 'loginAdmin']);
});
#end region admin
