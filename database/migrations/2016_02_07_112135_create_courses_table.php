<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table)
        {
            $table->string('courseCode', '10');
            $table->string('courseName', '50');
            $table->string('dCode', '10');
            $table->timestamps();

            // Key constraints
            $table->primary('courseCode');
            $table->foreign('dCode')
                  ->references('dCode')
                  ->on('departments')
                  ->onUpdate('cascade')
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
        Schema::drop('courses');
    }
}
