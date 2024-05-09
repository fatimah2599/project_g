<?php

namespace App\Http\Controllers;

use App\Models\SparePart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class SparePartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getSpareParts()
    {
        $cars = Car::all();
        return $this->sendResponse([
            'message' => "Action Successful",
            'data' => $spare_parts,
            'code' => "SUCCESS",
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id'=>'required',
            'name'=>'required',
            'made'=>'required',
            'model'=>'required',
            'piece_number'=>'required',
            'price'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
            
    }

    /**
     * Display the specified resource.
     */
    public function show(SparePart $sparePart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SparePart $sparePart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SparePart $sparePart)
    {
        //
    }

    
    public function searchByNameSparePart(Request $request, SparePart $name)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return $this->sendResponse([
                'data' => $validator->errors()->all(),
                'message' => 'validation error',
                'code' => 'VALIDATION_ERROR',
                'isSuccess' => false,
            ]);
        }
        $spare_part = SparePart::where('name', $request->input('name'))->get();

        if ($car->isEmpty()) {
            return $this->sendResponse([
                'data' => [],
                'message' => 'Spare Part is not found',
                'code' => 'NOT_FOUND',
                'isSuccess' => false,
            ]);
        }

        return $this->sendResponse([
            'data' => $car,
            'message' => 'Search By Name Successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);
    }

}
