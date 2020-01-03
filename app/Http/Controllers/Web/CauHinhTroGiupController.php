<?php

namespace App\Http\Controllers\Web;

use App\Components\Notification;
use App\Http\Controllers\Controller;
use App\CauHinhTroGiup;
use App\Http\Requests\FormCauHinhTroGiupRequest;
use Illuminate\Http\Request;

class CauHinhTroGiupController extends Controller
{
    use Notification;

    /**
     * Xem danh sách
     *
     * @return void
     */
    public function danh_sach(Request $req)
    {
        $dsCauHinhTroGiup = CauHinhTroGiup::all();
        return view('cau-hinh-tro-giup.quan-li', compact('dsCauHinhTroGiup'));
    }


    /**
     * Xem trang thêm mới
     *
     * @return void
     */
    public function them_moi()
    {
           return view('cau-hinh-tro-giup.them-moi');
    }
    

    /**
     * Xử lý thêm câu hỏi
     *
     * @param Request $request
     * @return void
     */
    public function xu_ly_them_moi(FormCauHinhTroGiupRequest $request){
        /// Kiêm tra id lĩnh vực
        if(CauHinhTroGiup::where('loai_tro_giup', $request->loai_tro_giup)->first() != null ){
            self::error('Loại trợ giúp này đã tồn tại!');
            return redirect()->route('cau-hinh-tro-giup.them-moi')->withInput();
        }

        CauHinhTroGiup::create([
            'loai_tro_giup' => $request->loai_tro_giup,
            'thu_tu' => $request->thu_tu,
            'credit' => $request->credit
        ]);

        self::success('Thêm thành công!');
        return redirect()->route('cau-hinh-tro-giup.them-moi');
    }

    /**
     * Xóa
     */
    public function xoa(Request $req, $id){
        $CauHinhTroGiup = CauHinhTroGiup::find($id);
        
        if($CauHinhTroGiup == null){
            self::error('Không tìm thấy!');
            return redirect()->route('cau-hinh-tro-giup.');
        }

        $CauHinhTroGiup->delete();

        self::success('Xóa thành công');
        return redirect()->route('cau-hinh-tro-giup.');
    }


    /**
     * Trang Sửa
     */
    public function sua(Request $request, $id)
    {
        $cau_hinh_tro_giup = CauHinhTroGiup::find($id);

        if($cau_hinh_tro_giup == null){
            self::error('Không tìm thấy!');
            return redirect()->route('cau-hinh-tro-giup.');
        }

        return view('cau-hinh-tro-giup.sua', compact('cau_hinh_tro_giup'));
    }


    /**
     * Xử lý sửa
     *
     * @param Request $req
     * @param [type] $id
     * @return void
     */
    public function xu_ly_sua(FormCauHinhTroGiupRequest $request, $id){
        /// Lấy Linh Vuc Model
        $cau_hinh_tro_giup = CauHinhTroGiup::find($id);
        if($cau_hinh_tro_giup == null){
            self::error('Không tìm thấy!');
            return redirect()->route('cau-hinh-tro-giup.')->withInput();
        }
        $cau_hinh_tro_giup->loai_tro_giup = $request->loai_tro_giup;
        $cau_hinh_tro_giup->thu_tu = $request->thu_tu;
        $cau_hinh_tro_giup->credit = $request->credit;
        $cau_hinh_tro_giup->save();

        self::success('Sửa lĩnh vực thành công');
        return redirect()->route('cau-hinh-tro-giup.sua', compact("id"));
    }
    
    /**
     * Trang thùng rác
     */
    public function thung_rac(){
        $dsCauHinhTroGiupDaXoa = CauHinhTroGiup::onlyTrashed()->get();
        return view('cau-hinh-tro-giup.thung-rac', compact('dsCauHinhTroGiupDaXoa'));
    }

    /**
     * Xử lý khôi phục lĩnh vực đã xóa
     */

     public function xu_ly_thung_rac($id)
     {
        $CauHinhTroGiup = CauHinhTroGiup::onlyTrashed()->find($id);
        
        if($CauHinhTroGiup == null){
            self::error('Khôi phục thất bại');
            return redirect()->route('cau-hinh-tro-giup.thung-rac');
        }

        $CauHinhTroGiup->restore();

        self::success('Khôi phục thành công');
        return redirect()->route('cau-hinh-tro-giup.thung-rac');
     }

}
