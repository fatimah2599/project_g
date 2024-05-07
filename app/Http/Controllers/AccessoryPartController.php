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
    public function storeAccessoryPart(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'brand' => 'required',
                'description' => 'required',
                'material' => 'required',
                'price' => 'required|numeric',
                'feature' => 'required',
                'availability_colors' => 'required|array',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
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

        $accessoryPart = new AccessoryPart;
        $accessoryPart->name = $request->name;
        $accessoryPart->brand = $request->brand;
        $accessoryPart->feature = $request->feature;
        $accessoryPart->material = $request->material;
        $accessoryPart->availability_colors = implode(',', $request->availability_colors);
        $accessoryPart->price = $request->price;
        $accessoryPart->description = $request->description;
        // process image
        if ($request->file('image')) {
            // generate new image name
            $imageName = date('Y_m_d_H_s_i') . "." . $request->image->getClientOriginalExtension();
            // path
            $path = "/accessoryParts";
            // store in public storage
            $request->image->move(public_path($path), $imageName);
            // store in database
            $accessoryPart->image = $imageName;
        }

        $accessoryPart->save();

        // return response
        return $this->sendResponse([
            'code' => "SUCCESS",
            'data' => $accessoryPart,
            'message' => 'Adding accessory part done succefully'
        ]);
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
