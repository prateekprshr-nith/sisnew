<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table)
        {
            $table->string('rollNo', '20');
            $table->string('sName', '100');
            $table->string('dCode', '10');
            $table->string('email', '50');
            $table->string('phoneNo', '15');
            $table->string('address', '200');
            $table->smallInteger('semNo');
            $table->string('sectionId', '10');
            $table->string('password', '50');
            $table->date('dob');
            $table->timestamps();

            // Key constraints
            $table->primary('rollNo');
            $table->unique('phoneNo');
            $table->unique('email');
            $table->foreign('dCode')
                  ->references('dCode')
                  ->on('departments')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('semNo')
                  ->references('semNo')
                  ->on('semesters')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('sectionId')
                  ->references('sectionId')
                  ->on('sections')
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
        Schema::drop('students');
    }
}
