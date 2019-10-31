<?php

use App\CauHoi;
use Illuminate\Database\Seeder;

class CauHoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CauHoi::create([
            'noidung' => '1 + 1 = ?',
            'linh_vuc_id' => '1',
            'phuongan_A' => '0',
            'phuongan_B' => '1',
            'phuongan_C' => '2',
            'phuongan_D' => '3',
            'dapan' => 'C'
        ]);
    }
}
