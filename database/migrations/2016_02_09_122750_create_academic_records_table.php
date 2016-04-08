<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academicRecords', function (Blueprint $table)
        {
            $table->string('rollNo', '20');
            $table->string('courseCode', '10');
            $table->smallInteger('attendance')->nullable();
            $table->smallInteger('periodicalMarks')->nullable();
            $table->smallInteger('asnMarks')->nullable();
            $table->smallInteger('finalMarks')->nullable();
            $table->timestamps();

            // Key constraints
            $table->primary(['rollNo', 'courseCode']);
            $table->foreign('rollNo')
                  ->references('rollNo')
                  ->on('students')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('courseCode')
                  ->references('courseCode')
                  ->on('teachingDetails')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('academicRecords');
    }
}
