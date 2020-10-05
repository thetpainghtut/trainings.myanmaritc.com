<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('inquireno');
            $table->string('receiveno')->nullable();
            $table->string('name');
            $table->string('gender');
            $table->string('phone');
            $table->date('installmentdate')->nullable();
            $table->string('installmentamount')->default(0);
            $table->bigInteger('status')->default(0);
            $table->longText('knowledge')->nullable();
            $table->string('camp');
            $table->string('acceptedyear')->nullable();
            $table->longText('message')->nullable();

            $table->unsignedBigInteger('education_id');
            $table->foreign('education_id')
                  ->references('id')->on('education')
                  ->onDelete('cascade'); 

            $table->unsignedBigInteger('batch_id');
            $table->foreign('batch_id')
                  ->references('id')->on('batches')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')->on('users')
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
        Schema::dropIfExists('inquires');
    }
}
