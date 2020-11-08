<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
   {
      $users = User::all();

      return response()->json($users, 200);
      //return view('user/danhsachuser')->with('name', $users);
   }

   public function showbyId(Request $request)
   {
      $user = User::where('id', $request->id)->first();
      return response()->json($user, 200);
   }

   public function editUser(Request $request)
   {
      try {
         $name = $request->name;
         $email = $request->email;       
         $user = User::find($request->id);
         $user->name = $name;
         $user->email = $email;
         $user->update();
         return response()->json($user, 200);
      } catch (\Throwable $th) {
         return response()->json('Không tìm thấy user này!', 400);
      }
   }

   public function deleteUser(Request $request, $id)
   {
      User::destroy($request->id);
      return response()->json('Xóa thành công!', 200);
   }
}
