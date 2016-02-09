<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPkAcademicRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('academicRecords', function (Blueprint $table) {
            $table->dropForeign('academicrecords_rollno_foreign');
            $table->dropPrimary('PRIMARY');
            $table->primary(['rollNo', 'courseCode']);
            $table->foreign('rollNo')
                ->references('rollNo')
                ->on('students')
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
        Schema::table('academicRecords', function (Blueprint $table)
        {
            $table->dropForeign('academicrecords_rollno_foreign');
            $table->dropPrimary('PRIMARY');
            $table->primary('rollNo');
            $table->foreign('rollNo')
                  ->references('rollNo')
                  ->on('students')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

        });
    }
}
