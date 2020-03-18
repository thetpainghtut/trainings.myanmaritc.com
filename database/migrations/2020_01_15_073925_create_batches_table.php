<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',100);
            $table->date('startdate');
            $table->date('enddate');
            $table->string('time',100);
            $table->unsignedBigInteger('course_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('course_id')
                  ->references('id')->on('courses')
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
        Schema::dropIfExists('batches');
    }
}
