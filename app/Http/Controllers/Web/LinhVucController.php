<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\CauHoi;
use App\LinhVuc;
use Illuminate\Http\Request;

class LinhVucController extends Controller
{
    /**
     * Xem danh sách
     *
     * @return void
     */
    public function danh_sach(Request $req)
    {
        $dsLinhVuc = LinhVuc::all();

        return view('linh-vuc.quan-li',[
            'dsLinhVuc' => $dsLinhVuc,
            'alert' => $this->findAlert($req->get('code'))
        ]);
    }


    /**
     * Xem trang thêm mới
     *
     * @return void
     */
    public function them_moi(Request $req){
       return view('linh-vuc.them-moi', [
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
        if(!$request->filled(['ten_linh_vuc'])){
            return redirect()->route('linh-vuc.them-moi', ["code" => 1])->withInput();
        }


        /// Kiêm tra id lĩnh vực
        if(LinhVuc::where('ten_linh_vuc', $request->ten_linh_vuc)->first() != null ){
            return redirect()->route('linh-vuc.them-moi', ["code" => 2])->withInput();
        }

        LinhVuc::create([
            'ten_linh_vuc' => $request->ten_linh_vuc,
        ]);

        return redirect()->route('linh-vuc.them-moi', ["code" => 3 ]);
    }

    /**
     * Xóa
     */
    public function xoa(Request $req, $id){
        $linhvuc = LinhVuc::find($id);
        
        if($linhvuc == null){
            return redirect()->route('linh-vuc.', ["code" => 4 ]);
        }

        $linhvuc->delete();

        return redirect()->route('linh-vuc.', ["code" => 5 ]);
    }


    /**
     * Trang Sửa
     */
    public function sua(Request $request, $id){
        $linh_vuc = LinhVuc::find($id);

        if($linh_vuc == null){
            return redirect()->route('linh-vuc.', ["code" => 4]);
        }

        return view('linh-vuc.sua', [
            'linh_vuc' => $linh_vuc,
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
        if(!$request->filled(['ten_linh_vuc'])){
            return redirect()->route('linh-vuc.sua', ["code" => 1, "id" => $id])->withInput();
        }

        /// Lấy Linh Vuc Model
        $linh_vuc = LinhVuc::find($id);
        if($linh_vuc == null){
            return redirect()->route('linh-vuc.', ["code" => 4])->withInput();
        }

        $linh_vuc->ten_linh_vuc = $request->ten_linh_vuc;
        $linh_vuc->save();

        return redirect()->route('linh-vuc.sua', ["code" => 7, "id" => $id]);
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
                $message = "Lĩnh vực này đã tồn tại";
            break;

            case 3:
                $type = "success";
                $message = "Thêm thành công";
            break;

            case 4:
                $type = "error2";
                $message = "Không tìm thấy";
            break;

            case 5:
                $type = "success2";
                $message = "Xóa thành công";
            break;
            
            case 7:
                $type = "success";
                $message = "Sửa lĩnh vực thành công";
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
