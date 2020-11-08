<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
//use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public $loginAfterSignUp = true;

    public function register(Request $request)
    {
        $params = $request->only('email', 'name', 'password');
        $user = new User();
        $user->email = $params['email'];
        $user->name = $params['name'];
        $user->password = bcrypt($params['password']);
        $user->name_role = 'admin';
        $user->save();

        $token = JWTAuth::attempt($params);


        return response()->json([
            'status' => true,
            'message' => 'Đăng kí thành công',
            'token' => $token
        ], 200);
    }
    public function dangkiclient(Request $request)
    {
        $params = $request->only('email', 'name', 'password');
        $user = new User();
        $user->email = $params['email'];
        $user->name = $params['name'];
        $user->password = bcrypt($params['password']);
        $user->name_role = 'client';
        $user->save();

        $token = JWTAuth::attempt($params);


        return response()->json([
            'status' => true,
            'message' => 'Đăng kí thành công',
            'token' => $token
        ], 200);
    }

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
        return response()->json([
            'status' => true,
            'token' => $token
        ], 200);
        // else{
        //     return redirect('/dasboard');
        //     }
    }
    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate($request->token);

            // return response()->json([
            //     'status' => 200,
            //     'message' => 'Đã đăng xuất thành công'
            return redirect('/login');
        } catch (JWTException $exception) {
            return response()->json([
                'status' => 500,
                'message' => 'Xin lỗi, bạn không thể đăng xuất'
            ]);
        }
    }
}
