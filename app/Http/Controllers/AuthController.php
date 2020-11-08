<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $token = null;

        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'status' => false,
                'message' => 'Email hoặc Password sai!',
            ], 401);
        }
        // return response()->json([
        //     'status' => true,
        //     'token' => $token
        // ], 200);
        else{
            return redirect('/dasboard');
            }
    }
}
