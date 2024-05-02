<?php

namespace App\Http\Controllers;
use App\Http\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends Controller
{
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

        public function update(Request $request, string $id)
        {

            $validator = Validator::make($request->all(), [
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
                'password' => ['required', 'string', 'min:8'],
                'phone' => ['required', 'string']
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->all(), Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $user = User::findOrFail($id);

            $user->email = $request->email;
            $user->password = bcrypt($request->password); // تأكد من تشفير كلمة المرور
            $user->phone = $request->phone;
            $user->save();

            return response()->json($user, Response::HTTP_CREATED);
        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }}
