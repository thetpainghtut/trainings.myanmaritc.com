<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsedetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsedetails', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('check_id');
            $table->foreign('check_id')
                  ->references('id')->on('checks')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')
                  ->references('id')->on('questions')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('response_id');
            $table->foreign('response_id')
                  ->references('id')->on('responses')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('responsedetails');
    }
}
