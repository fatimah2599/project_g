<?php

namespace App\Http\Controllers;

use App\Models\AccessoryPartsOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Response;

class AccessoryPartsOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAccessoryPartsOrders()
    {
        $AccessoryPartsOrders = AccessoryPartsOrder::all();

        return $this->sendResponse([
            'message' => "Action Successful",
            'data' => $AccessoryPartsOrders,
            'code' => "SUCCESS",
        ]);

    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AccessoryPartsOrder $accessoryPartsOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccessoryPartsOrder $accessoryPartsOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccessoryPartsOrder $accessoryPartsOrder)
    {
        //
    }
}
