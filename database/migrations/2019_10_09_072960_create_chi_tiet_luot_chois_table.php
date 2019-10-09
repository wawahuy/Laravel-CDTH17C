<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietLuotChoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_luot_chois', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('luotchoi_id');
            $table->foreign('luotchoi_id')->references('id')->on('luot_chois');
            $table->unsignedInteger('cauhoi_id');
            $table->foreign('cauhoi_id')->references('id')->on('cau_hois');
            $table->string('phuongan');
            $table->integer('diem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_luot_chois');
    }
}
