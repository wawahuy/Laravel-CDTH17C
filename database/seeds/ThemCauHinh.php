<?php

use App\CauHinhApp;
use App\CauHinhDiemCauHoi;
use App\CauHinhTroGiup;
use Illuminate\Database\Seeder;

class ThemCauHinh extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CauHinhApp::create([
            "co_hoi_sai" => 1,
            "thoi_gian_tra_loi" => 15
        ]);

        
        for($i=1; $i<16; $i++){
            CauHinhDiemCauHoi::create([
                "thu_tu" => $i,
                "diem" => 1000*$i
            ]);
        }

        CauHinhTroGiup::create([
            "thu_tu" => 5,
            "loai_tro_giup" => 1,
            "credit" => 1
        ]);

        CauHinhTroGiup::create([
            "thu_tu" => 5,
            "loai_tro_giup" => 2,
            "credit" => 2
        ]);

        CauHinhTroGiup::create([
            "thu_tu" => 10,
            "loai_tro_giup" => 3,
            "credit" => 1
        ]);
    }
}
