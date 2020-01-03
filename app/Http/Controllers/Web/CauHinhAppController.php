<?php

namespace App\Http\Controllers\Web;

use App\Components\Notification;
use App\Http\Controllers\Controller;
use App\CauHinhApp;
use App\Http\Requests\FormCauHinhAppRequest;
use Illuminate\Http\Request;

class CauHinhAppController extends Controller
{
    use Notification;

    /**
     * Xem danh sách
     *
     * @return void
     */
    public function danh_sach(Request $req)
    {
        $dsCauHinhApp = CauHinhApp::all();
        return view('cau-hinh-app.quan-li', compact('dsCauHinhApp'));
    }


    /**
     * Xem trang thêm mới
     *
     * @return void
     */
    public function them_moi()
    {
           return view('cau-hinh-app.them-moi');
    }
    

    /**
     * Xử lý thêm câu hỏi
     *
     * @param Request $request
     * @return void
     */
    public function xu_ly_them_moi(FormCauHinhAppRequest $request){
        /// Kiêm tra id lĩnh vực
        if(CauHinhApp::where('co_hoi_sai', $request->co_hoi_sai)->first() != null ){
            self::error('Cơ hội sai này đã tồn tại!');
            return redirect()->route('cau-hinh-app.them-moi')->withInput();
        }

        CauHinhApp::create([
            'co_hoi_sai' => $request->co_hoi_sai,
            'thoi_gian_tra_loi' => $request->thoi_gian_tra_loi
        ]);

        self::success('Thêm thành công!');
        return redirect()->route('cau-hinh-app.them-moi');
    }

    /**
     * Xóa
     */
    public function xoa(Request $req, $id){
        $CauHinhApp = CauHinhApp::find($id);
        
        if($CauHinhApp == null){
            self::error('Không tìm thấy!');
            return redirect()->route('cau-hinh-app.');
        }

        $CauHinhApp->delete();

        self::success('Xóa thành công');
        return redirect()->route('cau-hinh-app.');
    }


    /**
     * Trang Sửa
     */
    public function sua(Request $request, $id)
    {
        $cau_hinh_app = CauHinhApp::find($id);

        if($cau_hinh_app == null){
            self::error('Không tìm thấy!');
            return redirect()->route('cau-hinh-app.');
        }

        return view('cau-hinh-app.sua', compact('cau_hinh_app'));
    }


    /**
     * Xử lý sửa
     *
     * @param Request $req
     * @param [type] $id
     * @return void
     */
    public function xu_ly_sua(FormCauHinhAppRequest $request, $id){
        /// Lấy Linh Vuc Model
        $cau_hinh_app = CauHinhApp::find($id);
        if($cau_hinh_app == null){
            self::error('Không tìm thấy!');
            return redirect()->route('cau-hinh-app.')->withInput();
        }
        $cau_hinh_app->thoi_gian_tra_loi = $request->thoi_gian_tra_loi;
        $cau_hinh_app->save();

        self::success('Sửa lĩnh vực thành công');
        return redirect()->route('cau-hinh-app.sua', compact("id"));
    }
    
    /**
     * Trang thùng rác
     */
    public function thung_rac(){
        $dsCauHinhAppDaXoa = CauHinhApp::onlyTrashed()->get();
        return view('cau-hinh-app.thung-rac', compact('dsCauHinhAppDaXoa'));
    }

    /**
     * Xử lý khôi phục lĩnh vực đã xóa
     */

     public function xu_ly_thung_rac($id)
     {
        $CauHinhApp = CauHinhApp::onlyTrashed()->find($id);
        
        if($CauHinhApp == null){
            self::error('Khôi phục thất bại');
            return redirect()->route('cau-hinh-app.thung-rac');
        }

        $CauHinhApp->restore();

        self::success('Khôi phục thành công');
        return redirect()->route('cau-hinh-app.thung-rac');
     }

}
