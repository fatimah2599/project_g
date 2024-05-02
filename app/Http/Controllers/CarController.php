<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::query()->get();
        return response()->json ($cars , Response::HTTP_OK);
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
    public function show(Car $car)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }

    public function searchBYName(Request $request, Car $name){
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $car = Car::where('name', $request->input('name'))->first();

        if (!$car) {
            return response()->json('Car is not found', Response::HTTP_NOT_FOUND);
        }

        return response()->json($car, Response::HTTP_OK);

    }

    public function searchBYColor(Request $request, Car $color){
        $validator = Validator::make($request->all(),[
            'color' => ['required', 'string']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $car = Car::where('color', $request->input('color'))->first();

        if (!$car) {
            return response()->json('Car is not found', Response::HTTP_NOT_FOUND);
        }

        return response()->json($car, Response::HTTP_OK);

    }


    public function searchBYBrand(Request $request, Car $color){
        $validator = Validator::make($request->all(),[
            'brand' => ['required', 'string']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $car = Car::where('brand', $request->input('brand'))->first();

        if (!$car) {
            return response()->json('Car is not found', Response::HTTP_NOT_FOUND);
        }

        return response()->json($car, Response::HTTP_OK);

    }




}
