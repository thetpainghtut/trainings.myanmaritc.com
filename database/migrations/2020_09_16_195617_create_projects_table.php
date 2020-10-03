<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('link')->nullable();
            $table->string('status')->nullable();

            $table->unsignedBigInteger('projecttype_id');
            $table->foreign('projecttype_id')
                  ->references('id')->on('projecttypes')
                  ->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('project_student', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')
                  ->references('id')->on('projects')
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
        Schema::dropIfExists('projects');
    }
}
