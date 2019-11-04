<?php
namespace App\Http\Controllers\Web;

use App\Components\Notification;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormQuanTriVienRequest;
use App\QuanTriVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class QuanTriVienController extends Controller
{
    use Notification;

    public function dangnhap()
    {
        return view('login');
    }

    public function xu_ly_dang_nhap(Request $request)
    {
        if (Auth::attempt(['tai_khoan' => $request->tai_khoan, 'password' => $request
            ->mat_khau]))
        {
            return redirect()
                ->route('cau-hoi.');
        }

        return redirect()
            ->route('dang-nhap.')
            ->withInput($request->except('mat_khau'));
    }

    public function xu_ly_dang_xuat(Request $request)
    {
        Auth::logout();
        return redirect()->route('dang-nhap.');
    }

    /**
     * Xem danh sách
     *
     * @return void
     */
    public function danh_sach()
    {
        $dsQuanTriVien = QuanTriVien::all();
        return view('quan-tri-vien.quan-li', compact('dsQuanTriVien'));
    }

    /**
     * Xem trang thêm mới quản trị viên
     *
     * @return void
     */
    public function them_moi()
    {
        return view('quan-tri-vien.them-moi');
    }

    public function xu_ly_them_moi(FormQuanTriVienRequest $request)
    {
        if (QuanTriVien::where('tai_khoan', $request->tai_khoan)
            ->first() != null)
        {
            self::error('Tài khoản này đã tồn tại');
            return redirect()
                ->route('quan-tri-vien.them-moi')
                ->withInput();
        }
        QuanTriVien::create(['ho_ten' => $request->ho_ten, 'tai_khoan' => $request->tai_khoan, 'mat_khau' => Hash::make($request->mat_khau) ]);

        self::success('Thêm thành công');
        return redirect()
            ->route('quan-tri-vien.them-moi');
    }

    /*
     * Trang sửa quản trị viên
    */

    public function sua(Request $request, $id)
    {
        $quan_tri_vien = QuanTriVien::find($id);

        if ($quan_tri_vien == null)
        {
            self::sweet_error('Không tìm thấy!');
            return redirect()->route('quan-tri-vien.');
        }
        return view('quan-tri-vien.sua', compact('quan_tri_vien'));
    }

    /*
     * Xử lý sửa quản trị viên
    */

    public function xu_ly_sua(FormQuanTriVienRequest $request, $id)
    {
        $quan_tri_vien = QuanTriVien::find($id);
        if ($quan_tri_vien == null)
        {
            self::sweet_error('Không tìm thấy!');
            return redirect()->route('quan-tri-vien')
                ->withInput();
        }

        $quan_tri_vien->ho_ten = $request->ho_ten;
        $quan_tri_vien->tai_khoan = $request->tai_khoan;
        $quan_tri_vien->save();

        self::success('Sửa thành công');
        return redirect()
            ->route('quan-tri-vien.sua', compact('id'));

    }

    /*
     * Xóa quản trị viên
    */

    public function xoa($id)
    {
        $quan_tri_vien = QuanTriVien::find($id);
        if ($quan_tri_vien == null)
        {
            self::sweet_error('Không tìm thấy!');
            return redirect()->route('quan-tri-vien.');
        }
        $quan_tri_vien->delete();
        self::success('Xóa thành công!');
        return redirect()
            ->route('quan-tri-vien');

    }
}

