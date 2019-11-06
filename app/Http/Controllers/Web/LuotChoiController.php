<?php

namespace App\Http\Controllers\Web;

use App\Components\Notification;
use App\Http\Controllers\Controller;
use App\LuotChoi;

class LuotChoiController extends Controller
{
    //
    /**
     * Xem danh sách
     *
     * @return void
     */
    public function danh_sach()
    {
        $dsLuotChoi = LuotChoi::all();
        return view('luot-choi.quan-li', compact('dsLuotChoi'));
    }

    
}
