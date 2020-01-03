<?php

namespace App\Http\Controllers\Api;

use App\Components\APIResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\NguoiChoi;
use Illuminate\Support\Facades\Storage;

class NguoiChoiController extends Controller
{
    use APIResponse;

    public function login(Request $request){
        $tendangnhap = $request->taikhoan;
        $password = $request->matkhau;
        $token = Auth::guard('api')->attempt(compact('tendangnhap', 'password'));

        if($token){
            return $this->api_success(
                [
                    'token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => auth('api')->factory()->getTTL() * 60
                ],
                "Đăng nhập thành công."
            );
        }

        return $this->api_error("Đăng nhập thất bại.");
    }


    public function register(Request $request){
        $tendangnhap = $request->ten_dang_nhap;
        $password = $request->mat_khau;
        $nguoi_choi = NguoiChoi::where("tendangnhap", $tendangnhap)->withTrashed()->first();

        if($nguoi_choi != null){
            return $this->api_error("Người chơi đã tồn tại.");
        }

        NguoiChoi::create([
            'tendangnhap' => $tendangnhap,
            'matkhau' => Hash::make($password),
            'email' => '',
            'avatar' => '',
            'diemcaonhat' => 0,
            'credit' => 0,
            'remember_token' => ''
        ]);

        $token = Auth::guard('api')->attempt(compact('tendangnhap', 'password'));

        if($token){
            return $this->api_success(
                [
                    'token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => auth('api')->factory()->getTTL() * 60
                ],
                "Đăng ký thành công."
            );
        }

        return $this->api_error("Có lỗi xãy ra.");
    }


    public function unauthenticated(){
        return $this->api_error("unauthenticated.");
    }

    public function get_info(){
        $nguoi_choi = Auth::user();
        return $this->api_success($nguoi_choi);
    }

    public function re_password(Request $request){
        $nguoi_choi = Auth::user();
        if(!Hash::check($request->mat_khau_cu, $nguoi_choi->matkhau)){
            return $this->api_error("Mật khẩu cũ không hợp lệ.");
        }

        $nguoi_choi->matkhau = Hash::make($request->mat_khau_moi);
        $nguoi_choi->save();

        return $this->api_success(null, "Đổi mật khẩu thành công.");
    }

    public function avatar(Request $request){
        $file = $request->file('file');
        if(substr($file->getMimeType(), 0, 5) != 'image') {
            return $this->api_error("Ảnh tải lên không hợp lệ.");
        }

        $nguoi_choi = Auth::user();
        if($nguoi_choi->avatar != null){
            Storage::delete($nguoi_choi->avatar);
        }

        //Storage::url
        $nguoi_choi->avatar = $file->store('nguoi_choi');
        $nguoi_choi->save();
        return $this->api_success($nguoi_choi->avatar, "Tải ảnh đại diện thành công.");
    }

    public function ranking()
    {
        $luot_choi = NguoiChoi::where([])->orderBy('diemcaonhat', 'DESC')->offset(0)->take(20)->get();

        foreach ($luot_choi as $lc) {
            $lc->nguoi_choi = NguoiChoi::find($lc->nguoichoi_id);
        }

        return $this->api_success($luot_choi, '');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
