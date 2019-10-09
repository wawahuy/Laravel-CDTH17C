<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCauHoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cau_hois', function (Blueprint $table) {
            $table->increments('id');
            $table->string('noidung');
            $table->unsignedInteger('linh_vuc_id');
            $table->foreign('linh_vuc_id')->references('id')->on('linh_vucs');
            $table->string('phuongan_A');
            $table->string('phuongan_B');
            $table->string('phuongan_C');
            $table->string('phuongan_D');
            $table->string('dapan');
            $table->softDeletes();
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
        Schema::dropIfExists('cau_hois');
    }
}
