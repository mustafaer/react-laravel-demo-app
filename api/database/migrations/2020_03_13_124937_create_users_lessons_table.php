<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_student', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->timestamps();
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('lesson_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('lesson_id')->references('id')->on('lessons');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_lessons');
    }
}
