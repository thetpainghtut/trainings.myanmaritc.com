<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('trouble')->nullable();
            $table->longText('benefit')->nullable();
            $table->longText('teaching')->nullable();
            $table->longText('mentoring')->nullable();
            $table->longText('favourite')->nullable();
            $table->longText('speed')->nullable();
            $table->longText('maintain')->nullable();
            $table->longText('quote')->nullable();
            $table->longText('recommend')->nullable();
            $table->longText('stars')->nullable();
            
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')
                  ->references('id')->on('students')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('batch_id');
            $table->foreign('batch_id')
                  ->references('id')->on('batches')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('feedbacks');
    }
}
