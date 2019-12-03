<?php

namespace App\Http\Controllers\Api;

use App\CauHinhApp;
use App\CauHinhDiemCauHoi;
use App\CauHinhTroGiup;
use App\Components\APIResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CauHinhController extends Controller
{
    use APIResponse;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cau_hinh_app = CauHinhApp::all()
                            ->first()
                            ->get(['co_hoi_sai', 'thoi_gian_tra_loi'])[0];

        $cau_hinh_tro_giup = CauHinhTroGiup::all()
                                ->first()
                                ->get(['loai_tro_giup', 'thu_tu', 'credit'])[0];

        $cau_hinh_cau_hoi = CauHinhDiemCauHoi::all()
                                ->first()
                                ->get(['thu_tu', 'diem']);

        $cau_hinh = compact('cau_hinh_app', 'cau_hinh_tro_giup', 'cau_hinh_cau_hoi');
        return $this->api_success($cau_hinh);
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
