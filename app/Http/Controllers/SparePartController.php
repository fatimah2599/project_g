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
       $spareparts= SparePart::query()->get();
        return response()->json ($spareparts , Response::HTTP_OK);
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
            ])
    
            $inputSparePart = $request->all();
            if($image = $request->file('image')){
                $destinationPath ='/images/';
                $SparePartImage = date('YmdHis').".".$image->getClientOrginalExtension();
                $image=move($destinationPath, $SparePartImage);
                $inputSparePart['image'] = "$SparePartImage";
            }
    
            SparePart::create($inputSparePart);
    
            return response()->json ( $inputSparePart, Response::HTTP_ADDED);
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

    public function searchBYName(Request $request, SparePart $name){
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $sparePart = SparePart::where('name', $request->input('name'))->first();

        if (!$sparePart) {
            return response()->json(' sparePart is not found', Response::HTTP_NOT_FOUND);
        }

        return response()->json( $sparePart, Response::HTTP_OK);

    }
}
