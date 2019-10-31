<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\CauHoi;
use App\LinhVuc;
use Illuminate\Http\Request;

class CauHoiController extends Controller
{
    /**
     * Xem danh sách
     *
     * @return void
     */
    public function danh_sach(Request $req)
    {
        $dsCauHoi = CauHoi::all();

        return view('cau-hoi.quan-li-cau-hoi',[
            'dsCauHoi' => $dsCauHoi,
            'alert' => $this->findAlert($req->get('code'))
        ]);
    }


    /**
     * Xem trang thêm mới
     *
     * @return void
     */
    public function them_moi(Request $req){
        $linh_vuc = LinhVuc::all();
        return view('cau-hoi.them-moi', [
            'linhvuc' => $linh_vuc, 
            'alert' => $this->findAlert($req->get('code'))  /// cái key value này là tìm có thông báo ko cho layout xữ lý
            ]);
    }
    

    /**
     * Xử lý thêm câu hỏi
     *
     * @param Request $request
     * @return void
     */
    public function xu_ly_them_moi(Request $request){
        if(!$request->filled(['cauhoi', 'pan_A',  'pan_B',  'pan_C',  'pan_D',  'linhvuc', 'dapan'])){
            return redirect()->route('cau-hoi.them-moi', ["code" => 1])->withInput();
        }

        if($request->linhvuc == "-1"){
            return redirect()->route('cau-hoi.them-moi', ["code" => 2])->withInput();
        }

        if($request->dapan == "-1"){
            return redirect()->route('cau-hoi.them-moi', ["code" => 3])->withInput();
        }

        /// Kiêm tra id lĩnh vực
        if(LinhVuc::find($request->linhvuc) == null){
            return redirect()->route('cau-hoi.them-moi', ["code" => 4])->withInput();
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

        return redirect()->route('cau-hoi.them-moi', ["code" => 5 ]);
    }

    /**
     * Xóa
     */
    public function xoa(Request $req, $id){
        $cauhoi = CauHoi::find($id);
        
        if($cauhoi == null){
            return redirect()->route('cau-hoi.', ["code" => 7 ]);
        }

        $cauhoi->delete();

        return redirect()->route('cau-hoi.', ["code" => 6 ]);
    }


    /**
     * Trang Sửa
     */
    public function sua(Request $request, $id){
        $linh_vuc = LinhVuc::all();
        $cau_hoi = CauHoi::find($id);

        if($cau_hoi == null){
            return redirect()->route('cau-hoi.', ["code" => 9]);
        }

        return view('cau-hoi.sua', [
            'cau_hoi' => $cau_hoi,
            'linhvuc' => $linh_vuc, 
            'alert' => $this->findAlert($request->get('code'))  /// cái key value này là tìm có thông báo ko cho layout xữ lý
            ]);
    }


    /**
     * Xử lý sửa
     *
     * @param Request $req
     * @param [type] $id
     * @return void
     */
    public function xu_ly_sua(Request $request, $id){
        if(!$request->filled(['cauhoi', 'pan_A',  'pan_B',  'pan_C',  'pan_D',  'linhvuc', 'dapan'])){
            return redirect()->route('cau-hoi.sua', ["code" => 1, "id" => $id])->withInput();
        }

        if($request->linhvuc == "-1"){
            return redirect()->route('cau-hoi.sua', ["code" => 2, "id" => $id])->withInput();
        }

        if($request->dapan == "-1"){
            return redirect()->route('cau-hoi.sua', ["code" => 3, "id" => $id])->withInput();
        }

        /// Kiêm tra id lĩnh vực
        if(LinhVuc::find($request->linhvuc) == null){
            return redirect()->route('cau-hoi.sua', ["code" => 4, "id" => $id])->withInput();
        }

        /// Lấy Cau Hoi Model
        $cau_hoi = CauHoi::find($id);

        if($cau_hoi == null){
            return redirect()->route('cau-hoi.', ["code" => 9])->withInput();
        }

        $cau_hoi->noidung = $request->cauhoi;
        $cau_hoi->linh_vuc_id = $request->linhvuc;
        $cau_hoi->phuongan_A = $request->pan_A;
        $cau_hoi->phuongan_B = $request->pan_B;
        $cau_hoi->phuongan_C = $request->pan_C;
        $cau_hoi->phuongan_D = $request->pan_D;
        $cau_hoi->dapan = $request->dapan;
        $cau_hoi->save();

        return redirect()->route('cau-hoi.sua', ["code" => 12, "id" => $id]);
    }

    /**
     * Thông báo, copy cái này nếu muốn có thông báo nhe
     * trong lúc truyền ra view thì thêm key: "alert" giá trị nó là cái này
     * xem demo trên hàm `xu_ly_them_moi`
     *
     * @param [type] $code
     * @return void
     */
    public function findAlert($code){
        $message = null;    /// nội dung
        $type = null;       /// loại 'success', 'error', 'success2', 'error2'
        switch($code){
            case 1:
                $type = "error";
                $message = "Không được bỏ trống!";
            break;

            case 2:
                $type = "error";
                $message = "Vui lòng chọn lĩnh vực!";
            break;


            case 3:
                $type = "error";
                $message = "Vui lòng chọn đáp án đúng!";
            break;

            case 4:
                $type = "error";
                $message = "Lĩnh vực lỗi!";
            break;

            case 5:
                $type = "success";
                $message = "Thêm thành công";
            break;

            case 6:
                $type = "success2";
                $message = "Xóa thành công";
            break;

            case 7:
                $type = "error2";
                $message = "Xóa thất bại";
            break;

            case 9:
                $type = "error";
                $message = "Không tìm thấy câu hỏi";
            break;

            case 12:
                $type = "success";
                $message = "Sửa câu hỏi thành công";
            break;
        }

        if($type == null)
            return null;

        return [
            "type" => $type,
            "message" => $message,
        ];
    }
}
