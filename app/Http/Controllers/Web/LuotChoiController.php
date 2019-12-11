<?php

namespace App\Http\Controllers\Web;
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

    /**
     * Xóa
     */
    public function xoa(Request $req, $id){
        $luotchoi = LuotChoi::find($id);
        
        if($luotchoi == null){
            self::sweet_error('Không tìm thấy!');
            return redirect()->route('luot-choi.');
        }

        $luotchoi->delete();

        self::sweet_success('Xóa thành công');
        return redirect()->route('luot-choi.');
    }

    /**
     * Trang thùng rác
     */
    public function thung_rac(){
        $dsLuotChoiDaXoa = LuotChoi::onlyTrashed()->get();
        return view('luot-choi.thung-rac', compact('dsLuotChoiDaXoa'));
    }

    /**
     * Xử lý khôi phục lĩnh vực đã xóa
     */

     public function xu_ly_thung_rac($id)
     {
        $luotchoi = LuotChoi::onlyTrashed()->find($id);
        
        if($luotchoi == null){
            self::sweet_error('Khôi phục thất bại');
            return redirect()->route('luot-choi.thung-rac');
        }

        $luotchoi->restore();

        self::sweet_success('Khôi phục thành công');
        return redirect()->route('luot-choi.thung-rac');
     }
}
