<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchMentorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_mentor', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('batch_id');
            $table->foreign('batch_id')
                  ->references('id')->on('batches')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('mentor_id');
            $table->foreign('mentor_id')
                  ->references('id')->on('mentors')
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
        Schema::dropIfExists('batch_mentor');
    }
}
