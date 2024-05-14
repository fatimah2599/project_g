<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
 use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getOrders()
    {
        $Orders = Order::all();
        return $this->sendResponse([
            'data' =>$Orders ,
            'message' => 'get orders Successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addOrderForBuyCar(Request $request)
    {
        $order = new Order;
        $order->user_id = Auth::id();
        $order->total_price = 0.00;
        $order->date = now();
        $order->save();

        $salesData = array_map(function($sale) {
            return [
                'car_id' => $sale['car_id'],
                'count' => $sale['count'],
                'type' => $sale['type'],
                'price' => $sale['price'],
            ];
        }, $request->sales);

        $order->sales()->createMany($salesData);

        return $this->sendResponse([
            'data' => $salesData,
            'message' => 'order for car Successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);
    }




    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }


    public function sendResponse($response)
    {
        return response()->json($response);
    }

}
