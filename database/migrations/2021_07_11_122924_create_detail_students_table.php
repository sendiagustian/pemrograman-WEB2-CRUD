<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_student');
            $table->string('jurusan', 30);
            $table->string('asal_sekolah', 50);
            $table->timestamps();

            #references table
            $table->foreign('id_student')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_students');
    }
}
