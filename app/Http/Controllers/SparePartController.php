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
    public function index()
    {
       $sparePart= SparePart::query()->get();
        return $this->sendResponse([
            'data' => $sparePart,
            'message' => 'searchByName Successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
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

            $inputSparePart = $request->all();
            if($image = $request->file('image')){
                $destinationPath ='/images/';
                $SparePartImage = date('YmdHis').".".$image->getClientOrginalExtension();
                $image=move($destinationPath, $SparePartImage);
                $inputSparePart['image'] = "$SparePartImage";
            }

            SparePart::create($inputSparePart);


            return $this->sendResponse([
                'data' => $ $inputSparePart,
                'message' => 'store sparepart Successful',
                'code' => 'SUCCESS',
                'isSuccess' => true,
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

    public function searchByName(Request $request, SparePart $name){
        $validator = Validator::make($request->all(),[
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
        $sparePart = SparePart::where('name', $request->input('name'))->first();

        if (!$sparePart) {
            return $this->sendResponse([
                'data' => $sparePart->errors(),
                'message' => 'sparePart is not found',
                'code' => 'NOT_FOUND',
                'isSuccess' => false,
            ]);
          }
          return $this->sendResponse([
            'data' => $sparePart,
            'message' => 'searchByName Successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);

    }



}
