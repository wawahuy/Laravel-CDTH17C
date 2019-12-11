<?php

namespace App\Http\Controllers\Web;

use App\Components\Notification;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormAvatarNguoiChoiRequest;
use App\Http\Requests\FormLinhVucRequest;
use App\Http\Requests\FormSuaNguoiChoiRequest;
use App\Http\Requests\FormTTNguoiChoiRequest;
use App\LinhVuc;
use App\NguoiChoi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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
       return view('nguoi-choi.them-moi');
    }
    

    /**
     * Xử lý thêm ngươi chơi
     *
     * @param Request $request
     * @return void
     */
    public function xu_ly_them_moi(FormTTNguoiChoiRequest $request){
        NguoiChoi::create([
            'tendangnhap' => $request->ten_dang_nhap,
            'matkhau' => Hash::make($request->matkhau),
            'email' => $request->email,
            'avatar' => '',
            'diemcaonhat' => 0,
            'credit' => 0
        ]);

        self::success('Thêm thành công!');
        return redirect()->route('nguoi-choi.them-moi');
    }

    /**
     * Xóa
     */
    public function xoa(Request $req, $id){
        $nguoiChoi = NguoiChoi::find($id);
        
        if($nguoiChoi == null){
            self::sweet_error('Không tìm thấy!');
            return redirect()->route('nguoi-choi.');
        }

        $nguoiChoi->delete();

        self::sweet_success('Xóa thành công');
        return redirect()->route('nguoi-choi.');
    }


    /**
     * Thêm avatar
     */
    public function them_avatar(Request $req, $id){
        $nguoi_choi = NguoiChoi::find($id);

        if($nguoi_choi == null){
            self::sweet_error('Không tìm thấy!');
            return redirect()->route('nguoi-choi.');
        }

        return view('nguoi-choi.avatar', compact('nguoi_choi'));
    }


    /**
     * Xữ lý thêm avatar
     */
    public function xu_ly_them_avatar(Request $req, $id){

        $nguoi_choi = NguoiChoi::find($id);
        if($nguoi_choi == null){
            return response()->json([
                "code" => 400,
                "message" => "Không tìm thấy người chơi này!"
            ]);   
        }

        $validator = Validator::make($req->all(), [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->failed()) {
			return response()->json([
                "code" => 400,
                "message" => "Lỗi tải lên avatar!"
            ]);
        }

        ///// Chưa dùng laravel
        $data = $req->image;
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $image_name= time().'.png';
        $uri = "/avatars/" . $image_name;
        $path = public_path() . $uri;
        file_put_contents($path, $data);

        ///// Xóa avatar cũ
        if($nguoi_choi->avatar != null && $nguoi_choi->avatar != ''){
            @unlink(public_path().$nguoi_choi->avatar);
        }

        $nguoi_choi->avatar = $uri;
        $nguoi_choi->save();

        return response()->json([
            "code" => 200,
            "message" => 'Cập nhật avatar thành công!'
        ]);
    }


    /**
     * Trang Sửa
     */
    public function sua(Request $request, $id){
        $nguoi_choi = NguoiChoi::find($id);

        if($nguoi_choi == null){
            self::sweet_error('Không tìm thấy!');
            return redirect()->route('nguoi-choi.');
        }

        return view('nguoi-choi.sua', compact('nguoi_choi'));
    }


    /**
     * Xử lý sửa
     *
     * @param Request $req
     * @param [type] $id
     * @return void
     */
    public function xu_ly_sua(FormSuaNguoiChoiRequest $request, $id){
        /// Lấy Linh Vuc Model
        $nguoi_choi = NguoiChoi::find($id);
        if($nguoi_choi == null){
            self::sweet_error('Không tìm thấy!');
            return redirect()->route('nguoi-choi.');
        }

        $nguoi_choi->matkhau = $request->matkhau;
        $nguoi_choi->email = $request->email;
        $nguoi_choi->save();

        self::success('Sửa người chơi thành công');
        return redirect()->route('nguoi-choi.sua', compact("id"));
    }

    /**
     * Trang thùng rác
     */
    public function thung_rac(){
        $dsNguoiChoiDaXoa = NguoiChoi::onlyTrashed()->get();
        return view('nguoi-choi.thung-rac', compact('dsNguoiChoiDaXoa'));
    }

    /**
     * Xử lý khôi phục lĩnh vực đã xóa
     */

     public function xu_ly_thung_rac($id)
     {
        $nguoichoi = NguoiChoi::onlyTrashed()->find($id);
        
        if($nguoichoi == null){
            self::sweet_error('Khôi phục thất bại');
            return redirect()->route('nguoi-choi.thung-rac');
        }

        $nguoichoi->restore();

        self::sweet_success('Khôi phục thành công');
        return redirect()->route('nguoi-choi.thung-rac');
     }
}
