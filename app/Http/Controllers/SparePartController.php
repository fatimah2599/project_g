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
        $spare_part  = SparePart::all();
        return $this->sendResponse([
            'message' => "Action Successful",
            'data' => $spare_part,
            'code' => "SUCCESS",
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */

    public function storeSparePart(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'company_id' => 'required',
                'made' => 'required',
                'model' => 'required',
                'piece_number' => 'required|numeric',
                'price' => 'required|numeric',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
            ]
        );

        if ($validator->fails()) {
            return $this->sendResponse([
                'data' =>  $validator->errors()->all(),
                'message' => 'Validation failed',
                'code' => 'VALIDATION_ERROE',
                'isSuccess' => false,
            ]);
        }

        $sparePart = new SparePart;
        $sparePart->name = $request->name;
        $sparePart->company_id = $request->company_id;
        $sparePart->model = $request->model;
        $sparePart->made = $request->made;
        $sparePart->piece_number= $request->piece_number;
        $sparePart->price = $request->price;
        // process image
        if ($request->file('image')) {
            // generate new image name
            $imageName = date('Y_m_d_H_s_i') . "." . $request->image->getClientOriginalExtension();
            // path
            $path = "/spareParts";
            // store in public storage
            $request->image->move(public_path($path), $imageName);
            // store in database
            $sparePart->image = $imageName;
        }

        $sparePart->save();

        // return response
        return $this->sendResponse([
            'code' => "SUCCESS",
            'data' => $sparePart,
            'message' => 'Adding spare part done succefully'
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

        if ($spare_part ->isEmpty()) {
            return $this->sendResponse([
                'data' => [],
                'message' => 'Spare Part is not found',
                'code' => 'NOT_FOUND',
                'isSuccess' => false,
            ]);
        }

        return $this->sendResponse([
            'data' => $spare_part ,
            'message' => 'Search By Name Successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);
    }

}
