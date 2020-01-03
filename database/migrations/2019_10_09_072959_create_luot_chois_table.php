<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuotChoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * [user]
     * @return void
     */
    public function up()
    {
        Schema::create('luot_chois', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('nguoichoi_id');
            $table->foreign('nguoichoi_id')->references('id')->on('nguoi_chois');
            $table->integer('socau');
            $table->timestamp('ngaygio')->nullable();
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
        Schema::dropIfExists('luot_chois');
    }
}
