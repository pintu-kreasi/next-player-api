<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Classes\ApiResponseClass;


class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return ApiResponseClass::sendResponse($validator->errors(),'Validation Fails',422);
        }

        //get credentials from request
        $credentials = $request->only('email', 'password');
        $token = auth()->guard('api')->attempt($credentials);

        //if auth failed
        if(!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda salah'
            ], 401);
        }
        // return ApiResponseClass::sendResponse([],'Insert Failed',409);


        //if auth success
        return response()->json([
            'success' => true,
            'user'    => auth()->guard('api')->user(),
            'token'   => $token
        ], 200);
    }

    public function refreshToken(Request $request)
    {
        $newToken = auth()->refresh();
        return response()->json([
            'success' => true,
            // 'user'    => auth()->guard('api')->user(),
            'token'   => $newToken,
            'input' => $request->input('token'),
            // 'newToken' => auth()->refresh(),
            'auth' => auth('api')->user()??'kosong',
            // 'access_token' => $token,
            // 'token_type'   => 'bearer',
            //  'expires_in'   => auth()->factory()->getTTL() * 60
        ], 200);
    }
}
