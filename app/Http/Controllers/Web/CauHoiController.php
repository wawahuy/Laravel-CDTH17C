<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\CauHoi;
use App\Components\Notification;
use App\Http\Requests\FormCauHoiRequest;
use App\LinhVuc;
use Illuminate\Http\Request;

class CauHoiController extends Controller
{
    use Notification;

    /**
     * Xem danh sách
     *
     * @return void
     */
    public function danh_sach(Request $req)
    {
        $dsCauHoi = CauHoi::all();
        return view('cau-hoi.quan-li-cau-hoi', compact('dsCauHoi'));
    }


    /**
     * Xem trang thêm mới
     *
     * @return void
     */
    public function them_moi(Request $req){
        $linhvuc = LinhVuc::all();
        return view('cau-hoi.them-moi', compact('linhvuc'));
    }
    

    /**
     * Xử lý thêm câu hỏi
     *
     * @param Request $request
     * @return void
     */
    public function xu_ly_them_moi(FormCauHoiRequest $request){

        /// Kiêm tra id lĩnh vực
        if(LinhVuc::find($request->linhvuc) == null){
            self::error('Lĩnh vực lỗi!');
            return redirect()->route('cau-hoi.them-moi')->withInput();
        }

        CauHoi::create([
            'noidung' => $request->cauhoi,
            'linh_vuc_id' => $request->linhvuc,
            'phuongan_A' => $request->pan_A,
            'phuongan_B' => $request->pan_B,
            'phuongan_C' => $request->pan_C,
            'phuongan_D' => $request->pan_D,
            'dapan' => $request->dapan
        ]);

        self::success('Thêm thành công');
        return redirect()->route('cau-hoi.them-moi');
    }

    /**
     * Xóa
     */
    public function xoa(Request $req, $id){
        $cauhoi = CauHoi::find($id);
        
        if($cauhoi == null){
            self::sweet_error('Xóa thất bại');
            return redirect()->route('cau-hoi.');
        }

        $cauhoi->delete();

        self::sweet_success('Xóa thành công');
        return redirect()->route('cau-hoi.');
    }


    /**
     * Trang Sửa
     */
    public function sua(Request $request, $id){
        $linhvuc = LinhVuc::all();
        $cau_hoi = CauHoi::find($id);

        if($cau_hoi == null){
            self::error('Không tìm thấy câu hỏi');
            return redirect()->route('cau-hoi.');
        }

        return view('cau-hoi.sua', compact(['cau_hoi', 'linhvuc']));
    }


    /**
     * Xử lý sửa
     *
     * @param Request $req
     * @param [type] $id
     * @return void
     */
    public function xu_ly_sua(FormCauHoiRequest $request, $id){
        /// Kiêm tra id lĩnh vực
        if(LinhVuc::find($request->linhvuc) == null){
            self::error('Lĩnh vực lỗi!');
            return redirect()->route('cau-hoi.sua', compact("id"))->withInput();
        }

        /// Lấy Cau Hoi Model
        $cau_hoi = CauHoi::find($id);

        if($cau_hoi == null){
            self::error('Không tìm thấy câu hỏi');
            return redirect()->route('cau-hoi.')->withInput();
        }

        $cau_hoi->noidung = $request->cauhoi;
        $cau_hoi->linh_vuc_id = $request->linhvuc;
        $cau_hoi->phuongan_A = $request->pan_A;
        $cau_hoi->phuongan_B = $request->pan_B;
        $cau_hoi->phuongan_C = $request->pan_C;
        $cau_hoi->phuongan_D = $request->pan_D;
        $cau_hoi->dapan = $request->dapan;
        $cau_hoi->save();

        self::success('Sửa câu hỏi thành công');
        return redirect()->route('cau-hoi.sua',compact("id"));
    }

}
