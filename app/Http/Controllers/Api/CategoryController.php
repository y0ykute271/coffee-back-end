<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class CategoryController extends Controller
{
    public function index()
   {
      $categorys = Category::all(['name']);

      return response()->json($categorys, 200);
      //return view('danhmuc/danhsachdanhmuc')->with('name', $categorys);
      //var_dump($categorys);
   }
   public function showbyId($id)
   {
      $categorys = Category::where('id', $id)->first();
      return response()->json($categorys, 200);
   }
    public function addCategory(Request $request)
    {
        $params = $request->only('name');
        $categorys = new Category();
        $categorys->name = $params['name'];
        $categorys->save();

        $token = JWTAuth::attempt($params);

        //return view('danhmuc/themdanhmuc')->with('name', $categorys);
         return response()->json([
              'status' => true,
             'token' => $token
         ],200);
    }
   public function editCategory(Request $request, $id)
   {
      try {
         $name = $request->name;       
         $categorys  = Category::find($id);
         $categorys ->name = $name; 
         $categorys ->update();
         return response()->json($categorys , 200);
      } catch (\Throwable $th) {
         return response()->json('Không tìm thấy loại sản phẩm này!', 400);
      }
   }

   public function deleteCategory($id)
   {
      Category::destroy($id);
      return response()->json('Xóa thành công!', 200);
   }


}
