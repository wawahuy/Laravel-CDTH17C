<?php

namespace App\Http\Controllers\Web;

use App\Components\Notification;
use App\Http\Controllers\Controller;
use App\CauHinhDiemCauHoi;
use App\Http\Requests\FormCauHinhDiemCauHoiRequest;
use Illuminate\Http\Request;

class CauHinhDiemCauHoiController extends Controller
{
    use Notification;

    /**
     * Xem danh sách
     *
     * @return void
     */
    public function danh_sach(Request $req)
    {
        $dsCauHinhDiemCauHoi = CauHinhDiemCauHoi::all();
        return view('cau-hinh-diem-cau-hoi.quan-li', compact('dsCauHinhDiemCauHoi'));
    }


    /**
     * Xem trang thêm mới
     *
     * @return void
     */
    public function them_moi()
    {
           return view('cau-hinh-diem-cau-hoi.them-moi');
    }
    

    /**
     * Xử lý thêm câu hỏi
     *
     * @param Request $request
     * @return void
     */
    public function xu_ly_them_moi(FormCauHinhDiemCauHoiRequest $request){
        /// Kiêm tra id lĩnh vực
        if(CauHinhDiemCauHoi::where('thu_tu', $request->thu_tu)->first() != null ){
            self::error('Thứ tự câu hỏi này đã tồn tại!');
            return redirect()->route('cau-hinh-diem-cau-hoi.them-moi')->withInput();
        }

        CauHinhDiemCauHoi::create([
            'thu_tu' => $request->thu_tu,
            'diem' => $request->diem
        ]);

        self::success('Thêm thành công!');
        return redirect()->route('cau-hinh-diem-cau-hoi.them-moi');
    }

    /**
     * Xóa
     */
    public function xoa(Request $req, $id){
        $CauHinhDiemCauHoi = CauHinhDiemCauHoi::find($id);
        
        if($CauHinhDiemCauHoi == null){
            self::error('Không tìm thấy!');
            return redirect()->route('cau-hinh-diem-cau-hoi.');
        }

        $CauHinhDiemCauHoi->delete();

        self::success('Xóa thành công');
        return redirect()->route('cau-hinh-diem-cau-hoi.');
    }


    /**
     * Trang Sửa
     */
    public function sua(Request $request, $id)
    {
        $cau_hinh_diem_cau_hoi = CauHinhDiemCauHoi::find($id);

        if($cau_hinh_diem_cau_hoi == null){
            self::error('Không tìm thấy!');
            return redirect()->route('cau-hinh-diem-cau-hoi.');
        }

        return view('cau-hinh-diem-cau-hoi.sua', compact('cau_hinh_diem_cau_hoi'));
    }


    /**
     * Xử lý sửa
     *
     * @param Request $req
     * @param [type] $id
     * @return void
     */
    public function xu_ly_sua(FormCauHinhDiemCauHoiRequest $request, $id){
        /// Lấy Linh Vuc Model
        $cau_hinh_diem_cau_hoi = CauHinhDiemCauHoi::find($id);
        if($cau_hinh_diem_cau_hoi == null){
            self::error('Không tìm thấy!');
            return redirect()->route('cau-hinh-diem-cau-hoi.')->withInput();
        }
        $cau_hinh_diem_cau_hoi->diem = $request->diem;
        $cau_hinh_diem_cau_hoi->save();

        self::success('Sửa lĩnh vực thành công');
        return redirect()->route('cau-hinh-diem-cau-hoi.sua', compact("id"));
    }
    
    /**
     * Trang thùng rác
     */
    public function thung_rac(){
        $dsCauHinhDiemCauHoiDaXoa = CauHinhDiemCauHoi::onlyTrashed()->get();
        return view('cau-hinh-diem-cau-hoi.thung-rac', compact('dsCauHinhDiemCauHoiDaXoa'));
    }

    /**
     * Xử lý khôi phục lĩnh vực đã xóa
     */

     public function xu_ly_thung_rac($id)
     {
        $CauHinhDiemCauHoi = CauHinhDiemCauHoi::onlyTrashed()->find($id);
        
        if($CauHinhDiemCauHoi == null){
            self::error('Khôi phục thất bại');
            return redirect()->route('cau-hinh-diem-cau-hoi.thung-rac');
        }

        $CauHinhDiemCauHoi->restore();

        self::success('Khôi phục thành công');
        return redirect()->route('cau-hinh-diem-cau-hoi.thung-rac');
     }

}
