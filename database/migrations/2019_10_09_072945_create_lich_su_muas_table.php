<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLichSuMuasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lich_su_muas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('nguoichoi_id');
            $table->foreign('nguoichoi_id')->references('id')->on('nguoi_chois');
            $table->unsignedInteger('goicredit_id');
            $table->foreign('goicredit_id')->references('id')->on('goi_credits');
            $table->integer('credit');
            $table->integer('sotien');
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
        Schema::dropIfExists('lich_su_muas');
    }
}
