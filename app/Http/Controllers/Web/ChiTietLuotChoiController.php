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
    /**
     * Xóa
     */
    public function xoa(Request $req, $id){
        $chitietluotchoi = ChiTietLuotChoi::find($id);
        
        if($chitietluotchoi == null){
            self::error('Không tìm thấy!');
            return redirect()->route('chi-tiet-luot-choi.');
        }

        $chitietluotchoi->delete();

        self::success('Xóa thành công');
        return redirect()->route('chi-tiet-luot-choi.');
    }
    /**
     * Trang thùng rác
     */
    public function thung_rac(){
        $dsChiTietLuotChoiDaXoa = ChiTietLuotChoi::onlyTrashed()->get();
        return view('chi-tiet-luot-choi.thung-rac', compact('dsChiTietLuotChoiDaXoa'));
    }

    /**
     * Xử lý khôi phục lĩnh vực đã xóa
     */

     public function xu_ly_thung_rac($id)
     {
        $chitietluotchoi = ChiTietLuotChoi::onlyTrashed()->find($id);
        
        if($chitietluotchoi == null){
            self::error('Khôi phục thất bại');
            return redirect()->route('chi-tiet-luot-choi.thung-rac');
        }

        $chitietluotchoi->restore();

        self::success('Khôi phục thành công');
        return redirect()->route('chi-tiet-luot-choi.thung-rac');
     }
    
}
