<?php

use App\ChiTietLuotChoi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call([
            LinhVucSeeder::class,
            CauHoiSeeder::class,
            ThemQuanTriVienSeeder::class,
            NguoiChoiSeeder::class,
            LuotChoiSeeder::class,
            ChiTietLuotChoiSeeder::class,
            ThemCauHinh::class
        ]);
    }
}
