<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_unit', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')
                  ->references('id')->on('students')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')
                  ->references('id')->on('units')
                  ->onDelete('cascade');
            $table->string('symbol');
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
        Schema::dropIfExists('student_unit');
    }
}
