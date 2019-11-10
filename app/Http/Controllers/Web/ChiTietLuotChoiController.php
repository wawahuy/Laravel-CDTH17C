<?php

namespace App\Http\Controllers\Web;

use App\ChiTietLuotChoi;
use App\Http\Controllers\Controller;

class ChiTietLuotChoiController extends Controller
{
    //
    /**
     * Xem danh sách
     *
     * @return void
     */
    public function danh_sach()
    {
        $dsChiTietLuotChoi = ChiTietLuotChoi::all();
        return view('chi-tiet-luot-choi.quan-li', compact('dsChiTietLuotChoi'));
    }

    
}
