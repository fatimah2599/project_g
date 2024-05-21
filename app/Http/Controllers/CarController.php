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

    public function getCarsForBuy()
    {
        $cars = Car::where('status', 1)->get();
        return $this->sendResponse([
            'message' => "Action Successful",
            'data' => $cars,
            'code' => "SUCCESS",
        ]);
    }

    public function getCarsForRent()
    {
        $cars = Car::where('status', 0)->get();
        return $this->sendResponse([
            'message' => "Action Successful",
            'data' => $cars,
            'code' => "SUCCESS",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeCarForReservation(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'color' => 'required',
            'engine_type' => 'required',
            'price' => 'required',
            'engine_size' => 'required',
            'car_transmission' => 'required',
            'model' => 'required',
            'propulsion_type' => 'required',
            'production_year' => 'required',
            'amount' => 'required',
            'status' => 'required',
            'number_of_rented' => 'required',
            'company_id' => 'required',
            'fuel_tank_capacity' => 'required',
            'millage' => 'required',
            'date' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

        if ($request->fails()) {
            return $this->sendResponse([
                'data' => $request->errors()->all(),
                'message' => 'Validation failed',
                'code' => 'VALIDATION_ERROE',
                'isSuccess' => false,
            ]);
        }

        $car = new Car;
        $car->name = $request->name;
        $car->brand = $request->brand;
        $car->color = implode(',', $request->color);
        $car->engine_type = $request->engine_type;
        $car->price = $request->price;
        $car->engine_size = $request->engine_size;
        $car->car_transmission = $request->car_transmission;
        $car->model = $request->model;
        $car->propulsion_type = $request->propulsion_type;
        $car->production_year = $request->production_year;
        $car->amount = $request->amount;
        $car->status = 0;
        $car->number_of_rented = $request->number_of_rented ;
        $car->company_id = $request->company_id;
        $car->fuel_tank_capacity = $request->fuel_tank_capacity;
        $car->millage = $request->millage;
        $car->date = $request->date;

        // process image
        if ($request->file('image')) {
            // generate new image name
            $imageName = date('Y_m_d_H_s_i') . "." . $request->image->getClientOriginalExtension();
            // path
            $path = "/cars";
            // store in public storage
            $request->image->move(public_path($path), $imageName);
            // store in database
            $car->image = $imageName;
        }

        $car->save();

        // return response
        return $this->sendResponse([
            'code' => "SUCCESS",
            'data' => $car,
            'message' => 'Adding car done succefully'
        ]);
    }

    public function storeCarForBuying(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'color' => 'required',
            'engine_type' => 'required',
            'price' => 'required',
            'engine_size' => 'required',
            'car_transmission' => 'required',
            'model' => 'required',
            'propulsion_type' => 'required',
            'production_year' => 'required',
            'amount' => 'required',
            'status' => 'required',
           // 'number_of_rented' => 'required',
            'company_id' => 'required',
            'fuel_tank_capacity' => 'required',
           // 'millage' => 'required',
            'date' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

        if ($request->fails()) {
            return $this->sendResponse([
                'data' =>  $request->errors()->all(),
                'message' => 'Validation failed',
                'code' => 'VALIDATION_ERROE',
                'isSuccess' => false,
            ]);
        }

        $car = new Car;
        $car->name = $request->name;
        $car->brand = $request->brand;
        $car->color = implode(',', $request->color);
        $car->engine_type = $request->engine_type;
        $car->price = $request->price;
        $car->engine_size = $request->engine_size;
        $car->car_transmission = $request->car_transmission;
        $car->model = $request->model;
        $car->propulsion_type = $request->propulsion_type;
        $car->production_year = $request->production_year;
        $car->amount = $request->amount;
        $car->status = 1;
        //$car->number_of_rented = $request->number_of_rented ;
        $car->company_id = $request->company_id;
        $car->fuel_tank_capacity = $request->fuel_tank_capacity;
        //$car->millage = $request->millage;
        $car->date = $request->date;

        // process image
        if ($request->file('image')) {
            // generate new image name
            $imageName = date('Y_m_d_H_s_i') . "." . $request->image->getClientOriginalExtension();
            // path
            $path = "/cars";
            // store in public storage
            $request->image->move(public_path($path), $imageName);
            // store in database
            $car->image = $imageName;
        }

        $car->save();

        // return response
        return $this->sendResponse([
            'code' => "SUCCESS",
            'data' => $car,
            'message' => 'Adding car done succefully'
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
        $car = Car::where('name', $request->input('name'))->get();

        if ($car->isEmpty()) {
            return $this->sendResponse([
                'data' => [],
                'message' => 'Car is not found',
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
        $car = Car::where('color', $request->input('color'))->get();

        if ($car->isEmpty()) {
            return $this->sendResponse([
                'data' => [],
                'message' => 'Car is not found',
                'code' => 'NOT_FOUND',
                'isSuccess' => false,
            ]);
        }

        return $this->sendResponse([
            'data' => $car,
            'message' => 'Search By Color Successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);
    }


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
        $car = Car::where('brand', $request->input('brand'))->get();

        if ($car->isEmpty()) {
            return $this->sendResponse([
                'data' => [],
                'message' => 'Car is not found',
                'code' => 'NOT_FOUND',
                'isSuccess' => false,
            ]);
        }

        return $this->sendResponse([
            'data' => $car,
            'message' => 'Search By Brand Successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);
    }


    public function sortByPrice(Request $request)
    {
        $cars = Car::orderBy('price')->get();
        if ($cars->isEmpty()) {
            return $this->sendResponse([
                'data' => $cars->errors(),
                'message' => 'Car is not found',
                'code' => 'NOT_FOUND',
                'isSuccess' => false,
            ]);
        }
        return $this->sendResponse([
            'data' => $cars,
            'message' => 'Sort By Price Successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);
    }

    public function sortByYear(Request $request)
    {
        $cars = Car::orderBy('production_year')->get();
        if (!$cars) {
            return $this->sendResponse([
                'data' => [],
                'message' => 'Car is not found',
                'code' => 'NOT_FOUND',
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
