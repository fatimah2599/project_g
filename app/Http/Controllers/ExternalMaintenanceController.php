<?php

namespace App\Http\Controllers;

use App\Models\ExternalMaintenance;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExternalMaintenanceController extends Controller
{

public function requestMaintenance(Request $request)
{
    if (empty(Auth::user())) {
        return response()->json(['error' => 'Unauthorized'], 401);}
    $user = Auth::user();

    $validatedData = $request->validate([
        'car_color' => 'required|string',
        'plate_number' => 'required|integer',
        'car_model' => 'required|string',
        'location' => 'required|string',
    ]);

 $plateNumber = $validatedData['plate_number'];
        $existingRequest = ExternalMaintenance::where('user_id', $user->id)
        ->whereHas('user', function ($query) use ($plateNumber) {
            $query->where('plate_number', $plateNumber);
        })
        ->whereDate('created_at', Carbon::today())
        ->first();

    if ($existingRequest) {
        $minutesSinceLastRequest = Carbon::now()->diffInMinutes($existingRequest->created_at);

        if ($minutesSinceLastRequest < 20) {
            return response()->json([
                'message' => 'You have already submitted a maintenance request with the same details today. Please wait 20 minutes before submitting another request.'
            ], 429);
        }
    }

    User::where('id', Auth::id())->update([
        'car_color' => $validatedData['car_color'],
        'plate_number' => $validatedData['plate_number'],
        'car_model' => $validatedData['car_model'],
    ]);

    $order = new Order;
    $order->user_id = $user->id;
    $order->date = Carbon::now();
    $order->total_price = 0;
    $order->save();

    $maintenanceRequest = new ExternalMaintenance;
    $maintenanceRequest->company_id = null;
    $maintenanceRequest->user_id = $user->id;
    $maintenanceRequest->order_id = $order->id;
    $maintenanceRequest->location = $validatedData['location'];
    $maintenanceRequest->save();

    return response()->json([
        'message' => 'Maintenance request submitted successfully. We will get back to you shortly.'
    ], 201);
}

         public function approveMaintenance($id)
    {
        $user = Auth::user();
        if ($user->role !== 1) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $maintenanceRequest = ExternalMaintenance::find($id);
        if (!$maintenanceRequest) {
            return response()->json(['error' => 'Maintenance request not found'], 404);
        }

        if (!$maintenanceRequest->user_id || !$maintenanceRequest->order_id) {
            return response()->json(['error' => 'Maintenance request is not properly linked with user and order'], 400);
        }

        $maintenanceRequest->status = 1;
        $maintenanceRequest->save();

        return response()->json([
            'message' => 'Maintenance request approved successfully.',
            'maintenance_request' => $maintenanceRequest
        ], 200);
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
