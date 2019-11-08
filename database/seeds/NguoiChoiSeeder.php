<?php

use App\NguoiChoi;
use Illuminate\Database\Seeder;

class NguoiChoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        NguoiChoi::create([
            'tendangnhap' => 'lht',
            'matkhau' => '12345',
            'email' => 'lht1629@gmail.com',
            'avatar' => '1',
            'diemcaonhat' => '1629',
            'credit' => '1000',
        ]);
    }
}
