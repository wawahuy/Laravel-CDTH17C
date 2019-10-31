<?php

use App\LinhVuc;
use Illuminate\Database\Seeder;

class LinhVucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        LinhVuc::create([
           'ten_linh_vuc' => 'Toán học' 
        ]);
    }
}
