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

    //this->authorize('admin');
    //return $user->role === 1;

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
    public function updateAccessoryPartInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'material' => 'required',
            'price' => 'required|numeric',
            'feature' => 'required',
            'availability_colors' => 'required|array',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

        if ($validator->fails()) {
            return $this->sendResponse([
                'data' =>  $validator->errors()->all(),
                'message' => 'Validation failed',
                'code' => 'VALIDATION_ERROE',
                'isSuccess' => false,
            ]);
        }

        $accessoryPart = AccessoryPart::find($request->id);

        if (!$accessoryPart) {
            return $this->sendResponse([
                'data' =>  [],
                'message' => 'Accessory Part Not Found',
                'code' => 'NOT_FOUND',
                'isSuccess' => false,
            ]);
        }
        $imageName = "";
        // process photo
        if ($request->file('photo')) {
            // generate new image name
            $imageName = date('Y_m_d_H_s_i') . "." . $request->photo->getClientOriginalExtension();
            // path
            $path = "/accessoryparts";
            // store in storage storage
            $request->photo->move(storage_path($path), $imageName);
        }
        $accessoryPart->update([
        'id' => $request->id,
        'name' => $request->name,
        'brand' => $request->brand,
        'description' => implode(',', $request->color),
        'material' => $request->engine_type,
        'price' => $request->price,
        'feature' => $request->engine_size,
        'availability_colors' => $request->car_transmission,
        'model' => $request->model,
        'image' => $request->image
        ]);
       // unset($user->confirm_password);
        return $this->sendResponse([
            'data' =>  $accessoryPart,
            'message' => 'Update Accessory Part success',
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccessoryPart $accessoryPart)
    {
        //
    }


    public function searchByName(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string']
        ]);
        if ($validator->fails()) {
            return $this->sendResponse([
                'data' =>  $validator->errors()->all(),
                'message' => 'Validation failed',
                'code' => 'VALIDATION_ERROE',
                'isSuccess' => false,
            ]);
        }
        $accessoryPart = AccessoryPart::where('name', $request->name)->first();

        if (!$accessoryPart) {
            return $this->sendResponse([
                'data' =>  [],
                'message' => 'Accessory Part Not Found',
                'code' => 'NOT_FOUND',
                'isSuccess' => false,
            ]);
        }

        $accessoryPart->availability_colors = explode(',', $accessoryPart->availability_colors);
        return $this->sendResponse([
            'data' =>  $accessoryPart,
            'message' => 'Found successfully',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);
    }
}
