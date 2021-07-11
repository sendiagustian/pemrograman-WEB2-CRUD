<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_staffs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_staff');
            $table->string('jabatan', 30);
            $table->integer('gaji_pokok');
            $table->timestamps();


            #references table
            $table->foreign('id_staff')->references('id')->on('staffs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_staffs');
    }
}
