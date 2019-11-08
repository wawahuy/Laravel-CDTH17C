<?php

namespace App\Http\Controllers\Web;

use App\Components\Notification;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormLinhVucRequest;
use App\LinhVuc;
use App\NguoiChoi;
use Illuminate\Http\Request;

class NguoiChoiController extends Controller
{
    use Notification;

    /**
     * Xem danh sách
     *
     * @return void
     */
    public function danh_sach(Request $req)
    {
        $dsNguoiChoi = NguoiChoi::all();
        return view('nguoi-choi.quan-li', compact('dsNguoiChoi'));
    }


    /**
     * Xem trang thêm mới
     *
     * @return void
     */
    public function them_moi(Request $req){
       return view('linh-vuc.them-moi');
    }
    

    /**
     * Xử lý thêm ngươi chơi
     *
     * @param Request $request
     * @return void
     */
    public function xu_ly_them_moi(FormLinhVucRequest $request){
        /// Kiêm tra id lĩnh vực
        if(LinhVuc::where('ten_linh_vuc', $request->ten_linh_vuc)->first() != null ){
            self::error('Lĩnh vực này đã tồn tại!');
            return redirect()->route('linh-vuc.them-moi')->withInput();
        }

        LinhVuc::create([
            'ten_linh_vuc' => $request->ten_linh_vuc,
        ]);

        self::success('Thêm thành công!');
        return redirect()->route('linh-vuc.them-moi');
    }

    /**
     * Xóa
     */
    public function xoa(Request $req, $id){
        $linhvuc = LinhVuc::find($id);
        
        if($linhvuc == null){
            self::sweet_error('Không tìm thấy!');
            return redirect()->route('linh-vuc.');
        }

        $linhvuc->delete();

        self::sweet_success('Xóa thành công');
        return redirect()->route('linh-vuc.');
    }


    /**
     * Trang Sửa
     */
    public function sua(Request $request, $id){
        $linh_vuc = LinhVuc::find($id);

        if($linh_vuc == null){
            self::sweet_error('Không tìm thấy!');
            return redirect()->route('linh-vuc.');
        }

        return view('linh-vuc.sua', compact('linh_vuc'));
    }


    /**
     * Xử lý sửa
     *
     * @param Request $req
     * @param [type] $id
     * @return void
     */
    public function xu_ly_sua(FormLinhVucRequest $request, $id){
        /// Lấy Linh Vuc Model
        $linh_vuc = LinhVuc::find($id);
        if($linh_vuc == null){
            self::sweet_error('Không tìm thấy!');
            return redirect()->route('linh-vuc.')->withInput();
        }

        $linh_vuc->ten_linh_vuc = $request->ten_linh_vuc;
        $linh_vuc->save();

        self::success('Sửa lĩnh vực thành công');
        return redirect()->route('linh-vuc.sua', compact("id"));
    }

}
