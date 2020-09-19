<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('degree'); 

            $table->unsignedBigInteger('staff_id');
            $table->foreign('staff_id')
                  ->references('id')->on('staff')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')
                  ->references('id')->on('courses')
                  ->onDelete('cascade');
            
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('mentors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('degree')->nullabel();
            $table->string('portfolio',100);

            $table->unsignedBigInteger('staff_id');
            $table->foreign('staff_id')
                  ->references('id')->on('staff')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')
                  ->references('id')->on('courses')
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
        Schema::dropIfExists('teachers');
    }
}
