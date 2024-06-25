<?php

namespace App\Http\Controllers;

use App\Models\ExternalMaintenance;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExternalMaintenanceController extends Controller
{
    public function requestMaintenance(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user = Auth::user();

        $validatedData = $request->validate([
            'car_color' => 'required|string',
            'plate_number' => 'required|integer',
            'car_model' => 'required|string',
            'location' => 'required|string',
        ]);

        User::where('id', Auth::id())->update([
            'car_color' => $validatedData['car_color'],
            'plate_number' => $validatedData['plate_number'],
            'car_model' => $validatedData['car_model'],
        ]);

        $order = new Order;
        $order->user_id = $user->id;
        $order->date = $request->date;
        $order->save();

        $maintenanceRequest =  new ExternalMaintenance;
        $maintenanceRequest->company_id = null;
        $maintenanceRequest->user_id = $user->id;
        $maintenanceRequest->order_id = $order->id;
        $maintenanceRequest->location = $validatedData['location'];
        $maintenanceRequest->save();

        return response()->json([
            'message' => 'Maintenance request submitted successfully. We will get back to you shortly.'
        ], 201);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(ExternalMaintenance $externalMaintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExternalMaintenance $externalMaintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExternalMaintenance $externalMaintenance)
    {
        //
    }
}
