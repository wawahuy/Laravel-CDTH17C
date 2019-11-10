<?php

use App\ChiTietLuotChoi;
use Illuminate\Database\Seeder;

class ChiTietLuotChoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ChiTietLuotChoi::create([
            'luotchoi_id' => '1',
            'cauhoi_id' => '1',
            'phuongan' => 'C',
            'diem' => '1'
        ]);
    }
}
