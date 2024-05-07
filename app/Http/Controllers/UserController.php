<?php

namespace App\Http\Controllers;

use App\Http\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use ApiResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'phone' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'car_color' => 'nullable',
            'plate_number' =>  'nullable|numeric',
            'car_model' => 'nullable',
            'car_brand' => 'nullable'
        ]);

        if ($validator->fails()) {
            return $this->sendResponse([
                'data' =>  $validator->errors()->all(),
                'message' => 'Validation failed',
                'code' => 'VALIDATION_ERROE',
                'isSuccess' => false,
            ]);
        }

        $user = User::find(Auth::id());

        if (!$user) {
            return $this->sendResponse([
                'data' =>  [],
                'message' => 'User Not Found',
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
            $path = "/users";
            // store in storage storage
            $request->photo->move(storage_path($path), $imageName);
        }
        $user->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'phone' => $request->phone,
            'profile_photo_path' => $imageName,
            'car_color' => $request->car_color,
            'plate_number' => $request->plate_number,
            'car_model' => $request->car_model,
            'car_brand' => $request->car_brand
        ]);
        unset($user->confirm_password);
        return $this->sendResponse([
            'data' =>  $user,
            'message' => 'Update profile success',
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
