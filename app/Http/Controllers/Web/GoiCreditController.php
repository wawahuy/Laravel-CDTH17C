<?php

namespace App\Http\Controllers\Web;

use App\Components\Notification;
use App\GoiCredit;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormGoiCreditRequest;
use App\Http\Requests\FormLinhVucRequest;
use App\LinhVuc;
use Illuminate\Http\Request;

class GoiCreditController extends Controller
{
    use Notification;

    /**
     * Xem danh sách
     *
     * @return void
     */
    public function danh_sach(Request $req)
    {
        $dsGoiCredit = GoiCredit::all();
        return view('goi-credit.quan-li', compact('dsGoiCredit'));
    }


    /**
     * Xem trang thêm mới
     *
     * @return void
     */
    public function them_moi()
    {
           return view('goi-credit.them-moi');
    }
    

    /**
     * Xử lý thêm câu hỏi
     *
     * @param Request $request
     * @return void
     */
    public function xu_ly_them_moi(FormGoiCreditRequest $request){
        GoiCredit::create([
            'tengoi' => $request->tengoi,
            'credit' => $request->credit,
            'sotien' => $request->sotien
        ]);

        self::success('Thêm thành công!');
        return redirect()->route('goi-credit.them-moi');
    }

    /**
     * Xóa
     */
    public function xoa(Request $req, $id){
        $goi_credit = GoiCredit::find($id);
        
        if($goi_credit == null){
            self::sweet_error('Không tìm thấy!');
            return redirect()->route('goi-credit.');
        }

        $goi_credit->delete();

        self::sweet_success('Xóa thành công');
        return redirect()->route('goi-credit.');
    }


    /**
     * Trang Sửa
     */
    public function sua(Request $request, $id){
        $goi_credit = GoiCredit::find($id);

        if($goi_credit == null){
            self::sweet_error('Không tìm thấy!');
            return redirect()->route('goi-credit.');
        }

        return view('goi-credit.sua', compact('goi_credit'));
    }


    /**
     * Xử lý sửa
     *
     * @param Request $req
     * @param [type] $id
     * @return void
     */
    public function xu_ly_sua(FormGoiCreditRequest $request, $id){
        /// Lấy Linh Vuc Model
        $goi_credit = GoiCredit::find($id);
        if($goi_credit == null){
            self::sweet_error('Không tìm thấy!');
            return redirect()->route('goi-credit.')->withInput();
        }

        $goi_credit->tengoi = $request->tengoi;
        $goi_credit->credit = $request->credit;
        $goi_credit->sotien = $request->sotien;
        $goi_credit->save();

        self::success('Sửa lĩnh vực thành công');
        return redirect()->route('goi-credit.sua', compact("id"));
    }
    /**
     * Trang thùng rác
     */
    public function thung_rac(){
        $dsGoiCreditDaXoa = GoiCredit::onlyTrashed()->get();
        return view('goi-credit.thung-rac', compact('dsGoiCreditDaXoa'));
    }

    /**
     * Xử lý khôi phục lĩnh vực đã xóa
     */

     public function xu_ly_thung_rac($id)
     {
        $goicredit = GoiCredit::onlyTrashed()->find($id);
        
        if($goicredit == null){
            self::sweet_error('Khôi phục thất bại');
            return redirect()->route('linh-vuc.thung-rac');
        }

        $goicredit->restore();

        self::sweet_success('Khôi phục thành công');
        return redirect()->route('linh-vuc.thung-rac');
     }
}
