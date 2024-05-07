<?php

namespace App\Http\Controllers;

use App\Http\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return $this->sendResponse([
                'data' =>  $validator->errors()->all(),
                'message' => 'login failed',
                'code' => 'VALIDATION_ERROE',
                'isSuccess' => false,
            ]);
        }

        if (!Auth::attempt(request(['email', 'password']))) {
            return $this->sendResponse([
                'data' => [],
                'message' => 'The provided credentials are incorrect.',
                'code' => 'UNAUTHORIZED',
                'isSuccess' => false,
            ]);
        }

        $user = User::where('email', $request->email)->first();

        $token = $user->createToken('car 4 u')->plainTextToken;

        unset($user->password);
        unset($user->confirm_password);

        return $this->sendResponse([
            'data' => ['user' => $user, 'token' => $token],
            'message' => 'login Successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required', 'string', 'min:8', 'same:password'],
            'phone' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return $this->sendResponse([
                'data' => $validator->errors()->all(),
                'message' => 'validation error',
                'code' => 'VALIDATION_ERROR',
                'isSuccess' => false,
            ]);
        }

        $user = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'confirm_password' => $request->confirm_password,
            'phone' => $request->phone,
            'role' => 0,
        ]);

        $data["user"] = $user;
        $data['token'] = $user->createToken('car 4 u')->plainTextToken;

        return $this->sendResponse([
            'data' => $data,
            'message' => 'register successful',
            'code' => 'SUCCESS',
            'isSuccess' => true,
        ]);
    }
}
