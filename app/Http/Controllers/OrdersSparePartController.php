<?php

namespace App\Http\Controllers;

use App\Models\OrdersSparePart;
use App\Models\SparePart;
use Illuminate\Http\Request;

class OrdersSparePartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getOrdersSpareParts()
    {
        $OrdersSparePart = OrdersSparePart::all();
        return $this->sendResponse([
            'data' =>$OrdersSparePart  ,
            'message' => 'order for sparePart Successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addOrderSparePart(Request $request)
    {
      $sparePart= SparePart::find($request->spare_part_id);
      $orderSparePart = new OrdersSparePart();
      $orderSparePart->company_id=$request->company_id;
      $orderSparePart->name=$request->name;
      $orderSparePart->made=$request->made;
      $orderSparePart->model=$request->model;
      $orderSparePart->piece_number=$request->piece_number;
      $orderSparePart->price=$request->price;
      $orderSparePart->image=$request->image;
      $orderSparePart->save();

      return $this->sendResponse([
          'data' => $orderSparePart,
          'message' => 'تم طلب شراء قطعة ملحقة بنجاح',
          'code' => 'SUCCESS',
          'isSuccess' => true,
      ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(OrdersSparePart $ordersSparePart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrdersSparePart $ordersSparePart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdersSparePart $ordersSparePart)
    {
        //
    }
}
