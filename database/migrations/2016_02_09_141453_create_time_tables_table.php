<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeTables', function (Blueprint $table)
        {
            $table->string('sectionId', '10');
            $table->smallInteger('semNo');
            $table->string('day', '10');
            $table->string('class1', '10')->nullable();
            $table->string('class2', '10')->nullable();
            $table->string('class3', '10')->nullable();
            $table->string('class4', '10')->nullable();
            $table->string('class5', '10')->nullable();
            $table->string('class6', '10')->nullable();
            $table->string('class7', '10')->nullable();
            $table->string('class8', '10')->nullable();
            $table->timestamps();

            // Key constraints
            $table->primary(['sectionId', 'semNo', 'day']);
            $table->foreign('sectionId')
                  ->references('sectionId')
                  ->on('sections')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('semNo')
                  ->references('semNo')
                  ->on('semesters')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('day')
                  ->references('day')
                  ->on('days')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('class1')
                  ->references('courseCode')
                  ->on('teachingDetails')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('class2')
                  ->references('courseCode')
                  ->on('teachingDetails')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('class3')
                  ->references('courseCode')
                  ->on('teachingDetails')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('class4')
                  ->references('courseCode')
                  ->on('teachingDetails')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('class5')
                  ->references('courseCode')
                  ->on('teachingDetails')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('class6')
                  ->references('courseCode')
                  ->on('teachingDetails')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('class7')
                  ->references('courseCode')
                  ->on('teachingDetails')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('class8')
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
        Schema::drop('timeTables');
    }
}
