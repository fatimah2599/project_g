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
    public function index()
    {
        $Orders = Order::all();
        return response()->json ( $Orders, Response::HTTP_SHOWED);
    }

    //['id','user_id','total_price','date'];
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $order = new Order;
    $order->user_id = Auth::id(); // assuming the user is authenticated
    $order->save();

    $salesData = array_map(function($sale) {
        return ['car_id' => $sale['car_id']];
    }, $request->sales);

    $order->sales()->createMany($salesData);

    return response()->json(['message' => 'Order and sales created successfully'], 201);
}
//$order->car_id = $request->input('car_id');


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


}
