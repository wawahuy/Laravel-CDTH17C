<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuanTriVienController extends Controller
{
    //
    public function dangnhap()
    {
        return view('login');
    }
    public function xu_ly_dang_nhap(Request $request)
    {
         return response()->json($request->only('taikhoan', 'matkhau')); 
    }
}
