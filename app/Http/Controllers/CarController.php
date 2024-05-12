<?php

namespace App\Http\Controllers;

use App\Http\Traits\ApiResponses;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    use ApiResponses;
    /**
     * Display a listing of the resource.
     */
    public function getCars()
    {
        $cars = Car::all();
        return $this->sendResponse([
            'message' => "Action Successful",
            'data' => $cars,
            'code' => "SUCCESS",
            'isSuccess' => true,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name',
            'brand',
            'color',
            'engine_type',
            'price',
            'engine_size',
            'car_transmission',
            'model',
            'propulsion_type',
            'production_year',
            'amount',
            'status',
            'number_of_rented',
            'company_id',
            'fuel_tank_capacity',
            'millage',
            'date',
            // 'image' => $image,
        ]);

        $inputCar = $request->all();
        if ($image = $request->file('image')) {
            // $destinationPath = '/images/';
            // $CarImage = date('YmdHis') . "." . $image->getClientOrginalExtension();
            // $image = move($destinationPath, $CarImage);
            // $inputCar['image'] = "$CarImage";
        }

        Car::create($inputCar);

        return $this->sendResponse([
            'data' => $inputCar,
            'message' => 'searchByName Successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);
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

    public function searchByName(Request $request, Car $name)
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
        $car = Car::where('name', $request->input('name'))->first();

        if (!$car) {
            return $this->sendResponse([
                'data' => $car->errors(),
                'message' => 'Car is not found',
                'code' => 'NOT_FOUND',
                'isSuccess' => false,
            ]);
          }

            return $this->sendResponse([
                'data' => $car,
                'message' => 'searchByName Successful',
                'code' => 'SUCCESS',
                'isSuccess' => true,
            ]);
        }



    public function searchByColor(Request $request, Car $color)
    {
        $validator = Validator::make($request->all(), [
            'color' => ['required', 'string']
        ]);
        if ($validator->fails()) {
            return $this->sendResponse([
                'data' => $validator->errors()->all(),
                'message' => 'validation error',
                'code' => 'VALIDATION_ERROR',
                'isSuccess' => false,
            ]);
        }
        $car = Car::where('color', $request->input('color'))->first();

        if (!$car) {
            return $this->sendResponse([
                'data' => $car->errors(),
                'message' => 'Car is not found',
                'code' => 'NOT_FOUND',
                'isSuccess' => false,
            ]);
          }

        return $this->sendResponse([
            'data' => $car,
            'message' => 'searchByColor Successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);


    }
/////

    public function searchByBrand(Request $request, Car $color)
    {
        $validator = Validator::make($request->all(), [
            'brand' => ['required', 'string']
        ]);
        if ($validator->fails()) {
            return $this->sendResponse([
                'data' => $validator->errors()->all(),
                'message' => 'validation error',
                'code' => 'VALIDATION_ERROR',
                'isSuccess' => false,
            ]);
        }
        $car = Car::where('brand', $request->input('brand'))->first();

        if (!$car) {
            return $this->sendResponse([
                'data' => $car->errors(),
                'message' => 'Car is not found',
                'code' => 'NOT_FOUND',
                'isSuccess' => false,
            ]);
          }

          return $this->sendResponse([
            'data' => $car,
            'message' => 'searchByBrand Successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);
    }


    public function sortByPrice(Request $request)
    {
        $cars = Car::orderBy('price')->get();
        if (!$cars) {
            return $this->sendResponse([
                'data' => $cars->errors(),
                'message' => 'Car is not found',
                'code' => 'NOT_FOUND',
                'isSuccess' => false,
            ]);
          }
        return $this->sendResponse([
            'data' => $cars,
            'message' => 'sortByPrice Successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);

    }


    public function sortByYear(Request $request)
    {
        $cars = Car::orderBy('production_year')->get();
     if (!$cars) {
            return $this->sendResponse([
                'data' => $cars->errors(),
                'message' => 'Car is not found',
                'code' => 'CAR_NOT_FOUND',
                'isSuccess' => false,
            ]);
          }
        return $this->sendResponse([
            'data' => $cars,
            'message' => 'sortByYear Successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);
    }
}
