<?php

namespace App\Http\Controllers\Api;

use App\CauHinhDiemCauHoi;
use App\ChiTietLuotChoi;
use App\Components\APIResponse;
use App\Http\Controllers\Controller;
use App\LuotChoi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        foreach ($data as $cau_hoi_id) {
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
