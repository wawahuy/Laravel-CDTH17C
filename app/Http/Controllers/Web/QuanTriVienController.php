<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuanTriVienController extends Controller
{
    public function dangnhap()
    {
        return view('login');
    }

    public function xu_ly_dang_nhap(Request $request)
    {
        if(Auth::attempt(['tai_khoan' => $request->tai_khoan, 'password' => $request->mat_khau])){
            return redirect()->route('cau-hoi.');
        }

        return redirect()->route('dang-nhap.')->withInput($request->except('mat_khau'));
    }

    public function xu_ly_dang_xuat(Request $request){
        Auth::logout();
        return redirect()->route('dang-nhap.');
    }
}
