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
            $table->unsignedBigInteger('education_id');
            $table->string('acceptedyear')->nullable();

            //section
            $table->unsignedBigInteger('batch_id');

            //township
            $table->unsignedBigInteger('township_id');

            //user
            $table->unsignedBigInteger('user_id');
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
