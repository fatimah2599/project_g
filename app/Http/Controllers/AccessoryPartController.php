<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use App\Models\AccessoryPart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AccessoryPartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accessoryparts = AccessoryPart::query()->get();
        return response()->json ( $accessoryparts, Response::HTTP_OK);
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


    public function searchBYName(Request $request, AccessoryPart $name){
        $validator = Validator::make($request->all(),[
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
