<?php
namespace App\Http\Controllers\Api;

use App\CauHoi;
use App\Components\APIResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CauHinhDiemCauHoi;

class CauHoiController extends Controller
{
    use APIResponse;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->api_success(CauHoi::all());
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
        $cauhoi = CauHoi::find($id);

        if($cauhoi == null){
            return $this->api_error("Câu hỏi không tồn tại.");
        }

        return $this->api_success($cauhoi);
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


    public function lay_qua_linh_vuc($id, Request $request){
        $nguoi_choi = Auth::user();
        $cauhoi = DB::select("
            select * from cau_hois ch where  
                ch.linh_vuc_id = ?  and ch.deleted_at is null and
                ch.id not in (
                    select ctlc.cauhoi_id
                    from chi_tiet_luot_chois ctlc, luot_chois lc
                    where lc.nguoichoi_id = ? and ctlc.luotchoi_id = lc.id
                ) 
                limit 0, ?

        ", [$id, Auth::user()->id, CauHinhDiemCauHoi::count()]);


        if(count($cauhoi) < CauHinhDiemCauHoi::count()){
            return $this->api_error("Số lượng câu hỏi đang cạn kiệt, bạn vui long đợi.");
        }

        return $this->api_success($cauhoi);
    }
}
