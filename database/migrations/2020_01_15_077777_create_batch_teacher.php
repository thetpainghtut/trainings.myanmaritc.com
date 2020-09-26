<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_teacher', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('batch_id');
            $table->foreign('batch_id')
                  ->references('id')->on('batches')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')
                  ->references('id')->on('teachers')
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
        Schema::dropIfExists('batch_teacher');
    }
}
