<?php

use App\LuotChoi;
use Illuminate\Database\Seeder;

class LuotChoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        LuotChoi::create([
            'nguoichoi_id' => '1',
            'socau' => '1',
            'ngaygio' => '2019-11-06',
            'diem' => '1',
            
        ]);
    }
}
