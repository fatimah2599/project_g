<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccessoryPartController;
use App\Http\Controllers\SparePartController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\OrdersSparePartController;
use GuzzleHttp\Middleware;

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

//Route::middleware(['auth:sanctum'])->group(function () {
    // Accessory Part Api's
    Route::get('/getAccessoryParts', [AccessoryPartController::class, 'getAccessoryParts']);
    Route::post('/accessoryPart/searchByName', [AccessoryPartController::class, 'searchByName']);

    // User Api's
    Route::post('/updateProfile', [UserController::class, 'updateProfile']);

    // Car Api's
    Route::get('/getCarsForBuy', [CarController::class, 'getCarsForBuy']);
    Route::get('/getCarsForRent', [CarController::class, 'getCarsForRent']);
    Route::post('/sortByPrice', [CarController::class, 'sortByPrice']);
    Route::post('/sortByYear', [CarController::class, 'sortByYear']);
    Route::post('/searchByName', [CarController::class, 'searchByName']);
    Route::post('/searchByColor', [CarController::class, 'searchByColor']);
    Route::post('/searchByBrand', [CarController::class, 'searchByBrand']);

    // SparePart Api's
    Route::get('/getSpareParts', [SparePartController::class, 'getSpareParts']);
    Route::post('/searchByNameSparePart', [SparePartController::class, 'searchByNameSparePart']);

    // Order Api's
    Route::get('/getOrders', [OrderController::class, 'getOrders']);
    Route::post('addOrderForBuyCar', [OrderController::class, 'addOrderForBuyCar']);
// Reservation Api's

Route::post('getReservations', [ReservationController::class, 'getReservations']);
Route::post('addReservationForCar', [ReservationController::class, 'addReservationForCar']);
//ordersSpareParts
Route::get('/getOrdersSpareParts', [OrdersSparePartController::class, 'getOrdersSpareParts']);
Route::post('addOrderSparePart', [OrdersSparePartController::class, 'addOrderSparePart']);
//});
#end region user


#region admin


  //Route::post('/loginAdmin', [AuthController::class, 'loginAdmin']);
        Route::prefix('admin')->group(function () {
       
      //  Route::group(['middleware'=>['admin']],function(){
        Route::post('/storeAccessoryPart', [AccessoryPartController::class, 'storeAccessoryPart']);
        Route::post('/storeCarForReservation', [CarController::class, 'storeCarForReservation']);
        Route::post('/storeCarForBuying', [CarController::class, 'storeCarForBuying']);
        Route::post('/storeSparePart', [SparePartController::class, 'storeSparePart']);
        Route::post('/updateCarInfoForBuying', [CarController::class, 'updateCarInfoForBuying']);
        Route::post('/updateCarInfoForReservation', [CarController::class, 'updateCarInfoForReservation']);
        Route::post('/updateAccessoryPartInfo', [AccessoryPartController::class, 'updateAccessoryPartInfo']);
        Route::post('/updateSparePartInfo', [SparePartController::class, 'updateSparePartInfo']);
        Route::get('/getUsers', [AuthController::class, 'getUsers']);
        Route::delete('/deleteUsers', [UserController::class, 'deleteUsers']);
                 
       
            });
           // });

#end region admin
