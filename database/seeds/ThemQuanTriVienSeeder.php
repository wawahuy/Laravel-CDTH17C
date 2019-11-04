<?php

use App\QuanTriVien;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ThemQuanTriVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        QuanTriVien::create([
            'tai_khoan'=>'admin',
            'mat_khau'=>Hash::make('admin'),
            'ho_ten'=>'lcd'
            ]);
    }
}
