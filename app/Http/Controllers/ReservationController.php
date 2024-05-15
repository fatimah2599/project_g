<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use App\Models\Car;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getReservations()
    {
        $Reservations = Reservation::all();
        return $this->sendResponse([
            'data' => $Reservations  ,
            'message' => 'get Reservations Successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function addReservationForCar(Car $car)
{

    // التحقق من حالة السيارة
    if ($car->status != 0) {
        return $this->sendResponse([
            'message' => 'هذه السيارة غير متاحة للإيجار',
            'code' => 'ERROR',
            'isSuccess' => false,
        ]);
    }

   // التحقق من وجود طلب بيع للسيارة
    $saleOrder = Sale::where('car_id', $car->car_id)->first();
    if ($saleOrder ) {
        return $this->sendResponse([
            'message' => 'هذه السيارة لديها طلب بيع',
            'code' => 'ERROR',
            'isSuccess' => false,
        ]);
    }


    $reservation = new Reservation;
    $reservation ->user_id = Auth::id();
    $reservation->car_id = $car->car_id;
    $reservation->date = now();
    $reservation->period = $car->period;
    $reservation->cost = $car->cost;
    $reservation->info = $car->info;
    $reservation->status = 0 ;
    $reservation->value = $car->value;
    $reservation->type = $car->type;
    $reservation->save();

    return $this->sendResponse([
        'data' => $reservation,
        'message' => 'تم حجز السيارة بنجاح',
        'code' => 'SUCCESS',
        'isSuccess' => true,
    ]);
}


    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }

}
