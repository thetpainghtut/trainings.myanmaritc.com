<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_student', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')
                  ->references('id')->on('groups')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')
                  ->references('id')->on('students')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_student');
    }
}
