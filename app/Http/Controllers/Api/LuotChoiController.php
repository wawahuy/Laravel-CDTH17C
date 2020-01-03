<?php

namespace App\Http\Controllers\Api;

use App\CauHinhDiemCauHoi;
use App\ChiTietLuotChoi;
use App\Components\APIResponse;
use App\Http\Controllers\Controller;
use App\LuotChoi;
use App\NguoiChoi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LuotChoiController extends Controller
{
    use APIResponse;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nguoi_choi = Auth::user();
        $luot_choi = LuotChoi::where("nguoichoi_id", $nguoi_choi->id)
                        ->orderBy('ngaygio', 'DESC')->get();
        return $this->api_success($luot_choi, '');
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
        $data = json_decode($request->data);
        $nguoi_choi = Auth::user();
        $score = CauHinhDiemCauHoi::where('thu_tu', count($data))->first();

        if($score == null){
            return $this->api_error("Có lỗi xãy ra.");
        }

        $lc = new LuotChoi();
        $lc->nguoichoi_id = $nguoi_choi->id;
        $lc->socau = count($data);
        $lc->diem = $score->diem;
        $lc->save();

        /// 

        $i = 1;
        foreach ($data as $cau_hoi_id) {
            $score = CauHinhDiemCauHoi::where('thu_tu', $i)->first();
            $i++;
            ChiTietLuotChoi::create([
                "luotchoi_id" => $lc->id,
                "cauhoi_id" => $cau_hoi_id,
                "phuongan" => "--",
                "diem" => $score->diem
            ]);
        }

        
        return $this->api_success(null, "Hoàn thành");
    }

    /**
     * API lấy bxh them điêm cao
     */
    public function ranking()
    {
        $luot_choi = LuotChoi::where([])->orderBy('diem', 'DESC')->offset(0)->take(20)->get();

        foreach ($luot_choi as $lc) {
            $lc->nguoi_choi = NguoiChoi::find($lc->nguoichoi_id);
        }

        return $this->api_success($luot_choi, '');
    }

    /**
     * API lấy bxh them điêm cao
     */
    public function ranking_score_all()
    {
        $luot_choi = DB::select("select nguoichoi_id, sum(diem) tongdiem from `luot_chois` group by nguoichoi_id order by `diem` desc limit 20 offset 0");

        foreach ($luot_choi as $lc) {
            $lc->nguoi_choi = NguoiChoi::find($lc->nguoichoi_id);
        }

        return $this->api_success($luot_choi, '');
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
