<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProductController extends Controller
{
    public function index()
   {
      $products = Product::all();
      //return view('sanpham/danhsachsanpham')->with('name', $products);
      return response()->json($products, 200);
   }
   public function showbyId($id)
   {
      $products = Product::where('id', $id)->first();
      return response()->json($products, 200);
   }
   public function addProduct(Request $request)
    {
        $params = $request->only('name','mota','gia','hinhanh','soluong','trangthai','baohanh');
        $products = new product();
        $products->name = $params['name'];
        $products->mota = $params['mota'];
        $products->gia = $params['gia'];
        $products->hinhanh = $params['hinhanh'];
        $products->soluong = $params['soluong'];
        $products->trangthai = $params['trangthai'];
        $products->baohanh = $params['baohanh'];
        $products->save();

        //$token = JWTAuth::attempt($params);


        return response()->json([
            'status' => true,
            'message' => 'Thêm sản phẩm thành công',
            //'token' => $token
        ],200);
     
    }

   public function editProduct(Request $request, $id)
   {
      try {
         $name = $request->name;
         $mota = $request->mota;
         $gia = $request->gia;
         $hinhanh = $request->hinhanh;
         $soluong = $request->soluong; 
         $trangthai = $request->trangthai;      
         $products = Product::find($id);
         $products->name = $name;
         $products->mota = $mota;
         $products->soluong = $soluong;
         $products->gia = $gia;
         $products->hinhanh = $hinhanh;
         $products->trangthai = $trangthai;
         $products->update();
         return response()->json($products, 200);
      } catch (\Throwable $th) {
         return response()->json('Không tìm thấy sản phẩm này!', 400);
      }
   }

   public function deleteProduct($id)
   {
      Product::destroy($id);
      return response()->json('Xóa thành công!', 200);
   }
   
}
