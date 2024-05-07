<?php

namespace App\Http\Controllers;

use App\Http\Traits\ApiResponses;
use Illuminate\Http\Response;
use App\Models\AccessoryPart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AccessoryPartController extends Controller
{
    use ApiResponses;
    /**
     * Display a listing of the resource.
     */
    public function getAccessoryParts()
    {
        $accessoryparts = AccessoryPart::all();

        return $this->sendResponse([
            'message' => "Action Successful",
            'data' => $accessoryparts,
            'code' => "SUCCESS",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'material' => 'required',
            'price' => 'required',
            'feature' => 'required',
            'availability_colors' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        // $inputAccessoryPart = $request->all();
        // if ($image = $request->file('image')) {
        //     $destinationPath = '/images/';
        //     $AccessoryPartImage = date('YmdHis') . "." . $image->getClientOrginalExtension();
        //     $image = move($destinationPath, $AccessoryPartImage);
        //     $inputAccessoryPart['image'] = "$AccessoryPartImage";
        // }

        // AccessoryPart::create($inputAccessoryPart);

        // return response()->json($inputAccessoryPart, Response::HTTP_ADDED);
    }

    /**
     * Display the specified resource.
     */
    public function show(AccessoryPart $accessoryPart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccessoryPart $accessoryPart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccessoryPart $accessoryPart)
    {
        //
    }


    public function searchBYName(Request $request, AccessoryPart $name)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $accessoryPart = AccessoryPart::where('name', $request->input('name'))->first();

        if (!$accessoryPart) {
            return response()->json('accessoryPart  is not found', Response::HTTP_NOT_FOUND);
        }

        return response()->json($accessoryPart, Response::HTTP_OK);
    }
}
